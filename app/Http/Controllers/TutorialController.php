<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutorials = \App\Models\Tutorial::all();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn($w) => strtoupper($w[0]))->join('') : 'AU';
        return view('admin.tutorials', compact('tutorials', 'adminName', 'initials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'difficulty' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/tutorial_images'), $filename);
            $validated['image'] = 'tutorial_images/' . $filename;
        }
        $tutorial = \App\Models\Tutorial::create($validated);
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "added a new tutorial: {$tutorial->title}",
        ]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tutorial = \App\Models\Tutorial::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'link_tagakaulo' => 'nullable|url|max:255',
            'link_bagobo' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'difficulty' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/tutorial_images'), $filename);
            $validated['image'] = 'tutorial_images/' . $filename;
        }
        $tutorial->update($validated);
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "updated tutorial: {$tutorial->title}",
        ]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutorial = \App\Models\Tutorial::findOrFail($id);
        $tutorialTitle = $tutorial->title;
        $tutorial->delete();
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "deleted tutorial: {$tutorialTitle}",
        ]);
        
        return response()->json(['success' => true]);
    }

    public function userIndex(Request $request)
    {
        $tutorials = \App\Models\Tutorial::all();
        return view('User.tutorials', compact('tutorials'));
    }
}
