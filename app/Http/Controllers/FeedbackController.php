<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback = \App\Models\Feedback::all();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn($w) => strtoupper($w[0]))->join('') : 'AU';
        return view('admin.feedback_admin', compact('feedback', 'adminName', 'initials'));
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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit feedback.');
        }
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'type' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'file' => 'nullable|file|max:10240',
            'privacy_agreed' => 'boolean',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string',
        ]);
        $validated['user_id'] = auth()->id();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage'), $filename);
            $validated['file'] = $filename;
        }
        $validated['privacy_agreed'] = $request->has('privacy_agreed');
        \App\Models\Feedback::create($validated);
        if ($request->is('feedback')) {
            return redirect()->route('feedback')->with('success', 'Thank you for your feedback!');
        }
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
    public function update(Request $request, $id)
    {
        $feedback = \App\Models\Feedback::findOrFail($id);
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'type' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'file' => 'nullable|file|max:10240',
            'privacy_agreed' => 'boolean',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage'), $filename);
            $validated['file'] = $filename;
        }
        $validated['privacy_agreed'] = $request->has('privacy_agreed');
        $feedback->update($validated);
        
        // Log admin activity
        $feedbackName = $feedback->name ?? 'Anonymous';
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "updated feedback from: {$feedbackName}",
        ]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $feedback = \App\Models\Feedback::findOrFail($id);
        $feedbackName = $feedback->name ?? 'Anonymous';
        $feedback->delete();
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "deleted feedback from: {$feedbackName}",
        ]);
        
        return response()->json(['success' => true]);
    }

    public function userForm()
    {
        return view('User.feedback');
    }
}
