<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Healer;
use App\Models\Plant;
use App\Models\Tutorial;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $healerCount = Healer::count();
        $plantCount = Plant::count();
        $tutorialCount = Tutorial::count();

        $since = now()->subDay();

        $userGrowth = User::where('created_at', '>=', $since)->count();
        $healerGrowth = Healer::where('created_at', '>=', $since)->count();
        $plantGrowth = Plant::where('created_at', '>=', $since)->count();
        $tutorialGrowth = Tutorial::where('created_at', '>=', $since)->count();

        $recentActivities = Activity::with('user')->orderBy('created_at', 'desc')->limit(10)->get();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn($w) => strtoupper($w[0]))->join('') : 'AU';

        return view('admin.dashboard', compact(
            'userCount', 'healerCount', 'plantCount', 'tutorialCount',
            'recentActivities', 'adminName', 'initials',
            'userGrowth', 'healerGrowth', 'plantGrowth', 'tutorialGrowth'
        ));
    }

}