<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:4096', // max 4MB
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->withErrors('Not authenticated');
        }

        // store in storage/app/public/avatars
        $file = $request->file('avatar');
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('avatars', $filename, 'public');

        // delete previous avatar if exists
        if (!empty($user->avatar) && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->avatar = $path;
        $user->save();

        return redirect()->back()->with('success', 'Profile picture updated.');
    }
}