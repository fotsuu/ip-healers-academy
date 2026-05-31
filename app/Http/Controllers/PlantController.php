<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\Activity;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = \App\Models\Plant::all();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn($w) => strtoupper($w[0]))->join('') : 'AU';
        return view('admin.plants', compact('plants', 'adminName', 'initials'));
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
        try {
            $validated = $request->validate([
                'common_name' => 'required|string|max:255',
                'scientific_name' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'description' => 'nullable|string',
                'documented_uses' => 'nullable|string',
                'preparation_methods' => 'nullable|string',
                'preparation_methods_tagakaulo' => 'nullable|string',
                'preparation_methods_bagobo' => 'nullable|string',
                'habitat' => 'nullable|string',
                // allow any common image types and increase size limit to 5MB
                'image' => 'nullable|image|max:5120',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage'), $filename);
                $validated['image'] = $filename;
            }

            // Ensure all fields are set, even if null
            $validated['description'] = $validated['description'] ?? null;
            $validated['documented_uses'] = $validated['documented_uses'] ?? null;
            $validated['preparation_methods'] = $validated['preparation_methods'] ?? null;
            $validated['habitat'] = $validated['habitat'] ?? null;
            $validated['image'] = $validated['image'] ?? null;

            // Only include tribe-specific fields if columns exist in database
            $columns = Schema::getColumnListing('plants');
            if (in_array('preparation_methods_tagakaulo', $columns)) {
                $validated['preparation_methods_tagakaulo'] = $validated['preparation_methods_tagakaulo'] ?? null;
            } else {
                unset($validated['preparation_methods_tagakaulo']);
            }
            
            if (in_array('preparation_methods_bagobo', $columns)) {
                $validated['preparation_methods_bagobo'] = $validated['preparation_methods_bagobo'] ?? null;
            } else {
                unset($validated['preparation_methods_bagobo']);
            }

            $plant = \App\Models\Plant::create($validated);
            
            // Log admin activity
            Activity::create([
                'user_id' => Auth::id(),
                'description' => "added a new plant: {$plant->common_name}",
            ]);

            return response()->json(['success' => true]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $plant = \App\Models\Plant::findOrFail($id);
        
        // Return JSON for AJAX requests (edit modal)
        if ($request->wantsJson() || $request->ajax()) {
            $data = $plant->toArray();
            $data['image_url'] = $plant->image ? asset('storage/' . $plant->image) : null;
            return response()->json(['plant' => $data]);
        }
        
        $healers = $plant->healers;
        return view('User.plant_detail', compact('plant', 'healers'));
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
        $plant = \App\Models\Plant::findOrFail($id);
        $validated = $request->validate([
            'common_name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'documented_uses' => 'nullable|string',
            'preparation_methods' => 'nullable|string',
            'preparation_methods_tagakaulo' => 'nullable|string',
            'preparation_methods_bagobo' => 'nullable|string',
            'habitat' => 'nullable|string',
            // allow any common image types and increase size limit to 5MB
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage'), $filename);
            $validated['image'] = $filename;
        }

        // Ensure all fields are set, even if null
        $validated['description'] = $validated['description'] ?? null;
        $validated['documented_uses'] = $validated['documented_uses'] ?? null;
        $validated['preparation_methods'] = $validated['preparation_methods'] ?? null;
        $validated['habitat'] = $validated['habitat'] ?? null;
        $validated['image'] = $validated['image'] ?? $plant->image;

        // Only include tribe-specific fields if columns exist in database
        $columns = Schema::getColumnListing('plants');
        if (in_array('preparation_methods_tagakaulo', $columns)) {
            $validated['preparation_methods_tagakaulo'] = $validated['preparation_methods_tagakaulo'] ?? null;
        } else {
            unset($validated['preparation_methods_tagakaulo']);
        }
        
        if (in_array('preparation_methods_bagobo', $columns)) {
            $validated['preparation_methods_bagobo'] = $validated['preparation_methods_bagobo'] ?? null;
        } else {
            unset($validated['preparation_methods_bagobo']);
        }

        $plant->update($validated);
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "updated plant: {$plant->common_name}",
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plant = \App\Models\Plant::findOrFail($id);
        $plantName = $plant->common_name;
        $plant->delete();
        
        // Log admin activity
        Activity::create([
            'user_id' => Auth::id(),
            'description' => "deleted plant: {$plantName}",
        ]);
        
        return response()->json(['success' => true]);
    }

    public function userIndex(Request $request)
    {
        $query = \App\Models\Plant::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('common_name', 'like', '%' . $search . '%');
        }
        $plants = $query->get();
        return view('User.plants', compact('plants'));
    }

    public function search(Request $request)
    {
        $search = $request->input('q');
        $plants = \App\Models\Plant::where('common_name', 'like', '%' . $search . '%')
            ->orderByRaw('LENGTH(common_name)')
            ->limit(5)
            ->get(['id', 'common_name']);
        return response()->json($plants);
    }

    /**
     * Get all plants for the featured section on the home page.
     */
    public function featured()
    {
        $plants = \App\Models\Plant::all();
        return response()->json($plants);
    }
}
