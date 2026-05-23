<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class IndigenousKnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $knowledge = \App\Models\IndigenousKnowledge::all();
        $healers = \App\Models\Healer::all();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn($w) => strtoupper($w[0]))->join('') : 'AU';
        return view('admin.indigenous_knowledge', compact('knowledge', 'healers', 'adminName', 'initials'));
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
            'healer_id' => 'required|exists:healers,id',
            'practice_name' => 'required|string|max:255',
            'cultural_significance' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $knowledge = \App\Models\IndigenousKnowledge::create($validated);
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "added indigenous knowledge: {$knowledge->practice_name}",
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
        $validated = $request->validate([
            'healer_id' => 'required|exists:healers,id',
            'practice_name' => 'required|string|max:255',
            'cultural_significance' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $knowledge = \App\Models\IndigenousKnowledge::findOrFail($id);
        $knowledge->update($validated);
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "updated indigenous knowledge: {$knowledge->practice_name}",
        ]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $knowledge = \App\Models\IndigenousKnowledge::findOrFail($id);
        $knowledgeName = $knowledge->practice_name;
        $knowledge->delete();
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "deleted indigenous knowledge: {$knowledgeName}",
        ]);
        
        return response()->json(['success' => true]);
    }
}
