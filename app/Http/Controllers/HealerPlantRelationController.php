<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class HealerPlantRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relations = \App\Models\HealerPlantRelation::all();
        $healers = \App\Models\Healer::all();
        $plants = \App\Models\Plant::all();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn($w) => strtoupper($w[0]))->join('') : 'AU';
        return view('admin.healer_plant_relations', compact('relations', 'healers', 'plants', 'adminName', 'initials'));
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
            'plant_id' => 'required|exists:plants,id',
            'notes' => 'nullable|string',
        ]);
        $relation = \App\Models\HealerPlantRelation::create($validated);
        
        // Get healer and plant names for logging
        $healer = \App\Models\Healer::find($relation->healer_id);
        $plant = \App\Models\Plant::find($relation->plant_id);
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "created healer-plant relation: {$healer->healer_name} - {$plant->common_name}",
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
        $relation = \App\Models\HealerPlantRelation::findOrFail($id);
        
        // Get healer and plant names before update for logging
        $healer = \App\Models\Healer::find($relation->healer_id);
        $plant = \App\Models\Plant::find($relation->plant_id);
        
        $validated = $request->validate([
            'healer_id' => 'required|exists:healers,id',
            'plant_id' => 'required|exists:plants,id',
            'notes' => 'nullable|string',
        ]);
        
        $relation->update($validated);
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "updated healer-plant relation: {$healer->healer_name} - {$plant->common_name}",
        ]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $relation = \App\Models\HealerPlantRelation::findOrFail($id);
        
        // Get healer and plant names before deletion for logging
        $healer = \App\Models\Healer::find($relation->healer_id);
        $plant = \App\Models\Plant::find($relation->plant_id);
        
        $relation->delete();
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "deleted healer-plant relation: {$healer->healer_name} - {$plant->common_name}",
        ]);
        
        return response()->json(['success' => true]);
    }
}
