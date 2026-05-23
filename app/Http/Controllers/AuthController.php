<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Activity;

class AuthController extends Controller
{
    // Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log activity
        Activity::create([
            'user_id' => $user->id,
            'description' => 'registered an account',
        ]);

        Auth::login($user);
        // Flash message for registration
        session()->flash('registered_success', true);
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('User.home');
        }
    }

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();
            // Log activity
            Activity::create([
                'user_id' => $user->id,
                'description' => 'logged in',
            ]);
            // Flash message for login
            session()->flash('login_success', true);
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended(route('User.home'));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle logout (optional)
    public function logout(Request $request)
    {
        $user = Auth::user();
        
        // Log activity before logout
        if ($user) {
            Activity::create([
                'user_id' => $user->id,
                'description' => 'logged out',
            ]);
        }
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function home()
    {
        $featuredPlants = \App\Models\Plant::all();
        return view('User.home', compact('featuredPlants'));
    }

    public function ethnobotanicalSearch(Request $request)
    {
        $q = $request->input('q');
        $plants = \App\Models\Plant::where('common_name', 'like', "%{$q}%")
            ->orWhere('scientific_name', 'like', "%{$q}%")
            ->limit(10)
            ->get(['id', 'common_name', 'scientific_name', 'image']);
        $healers = \App\Models\Healer::where('healer_name', 'like', "%{$q}%")
            ->orWhere('location', 'like', "%{$q}%")
            ->orWhere('specialization', 'like', "%{$q}%")
            ->limit(10)
            ->get(['id', 'healer_name', 'location', 'specialization', 'image']);
        return response()->json([
            'plants' => $plants,
            'healers' => $healers
        ]);
    }
} 