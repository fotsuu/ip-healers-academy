<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Plant;
use App\Models\PlantTutorialRelation;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantTutorialRelationController extends Controller
{
    public function index()
    {
        $relations = PlantTutorialRelation::with(['plant', 'tutorial'])->get();
        $plants = Plant::all();
        $tutorials = Tutorial::all();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn ($w) => strtoupper($w[0]))->join('') : 'AU';

        return view('admin.plant_tutorial_relations', compact('relations', 'plants', 'tutorials', 'adminName', 'initials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plant_id' => 'required|exists:plants,id|unique:plant_tutorial_relations,plant_id',
            'tutorial_id' => 'required|exists:tutorials,id',
            'notes' => 'nullable|string',
        ]);

        $relation = PlantTutorialRelation::create($validated);

        $plant = Plant::find($relation->plant_id);
        $tutorial = Tutorial::find($relation->tutorial_id);

        Activity::create([
            'user_id' => Auth::id(),
            'description' => "created plant-tutorial relation: {$plant->common_name} - {$tutorial->title}",
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, string $id)
    {
        $relation = PlantTutorialRelation::findOrFail($id);

        $validated = $request->validate([
            'plant_id' => 'required|exists:plants,id|unique:plant_tutorial_relations,plant_id,' . $relation->id,
            'tutorial_id' => 'required|exists:tutorials,id',
            'notes' => 'nullable|string',
        ]);

        $relation->update($validated);

        $plant = Plant::find($relation->plant_id);
        $tutorial = Tutorial::find($relation->tutorial_id);

        Activity::create([
            'user_id' => Auth::id(),
            'description' => "updated plant-tutorial relation: {$plant->common_name} - {$tutorial->title}",
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(string $id)
    {
        $relation = PlantTutorialRelation::findOrFail($id);
        $plant = Plant::find($relation->plant_id);
        $tutorial = Tutorial::find($relation->tutorial_id);

        $relation->delete();

        Activity::create([
            'user_id' => Auth::id(),
            'description' => "deleted plant-tutorial relation: {$plant->common_name} - {$tutorial->title}",
        ]);

        return response()->json(['success' => true]);
    }
}
