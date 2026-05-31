<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class HealerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healers = \App\Models\Healer::all();
        $admin = Auth::user();
        $adminName = $admin ? $admin->name : 'Admin User';
        $initials = $admin ? collect(explode(' ', $admin->name))->map(fn($w) => strtoupper($w[0]))->join('') : 'AU';
        return view('admin.healers', compact('healers', 'adminName', 'initials'));
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
                'healer_name' => 'required|string|max:255',
                'ethnic_group' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'latitude' => 'nullable|string|max:255',
                'longitude' => 'nullable|string|max:255',
                'specialization' => 'nullable|string|max:255',
                'experience_years' => 'nullable|integer|min:0',
                'languages' => 'nullable|string|max:255',
                'about' => 'nullable|string',
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
            $validated['ethnic_group'] = $validated['ethnic_group'] ?? null;
            $validated['phone'] = $validated['phone'] ?? null;
            $validated['latitude'] = $validated['latitude'] ?? null;
            $validated['longitude'] = $validated['longitude'] ?? null;
            $validated['specialization'] = $validated['specialization'] ?? null;
            $validated['experience_years'] = $validated['experience_years'] ?? null;
            $validated['languages'] = $validated['languages'] ?? null;
            $validated['about'] = $validated['about'] ?? null;
            $validated['image'] = $validated['image'] ?? null;
            $healer = \App\Models\Healer::create($validated);
            
            // Log admin activity
            Activity::create([
                'user_id' => Auth::id(),
                'description' => "added a new healer: {$healer->healer_name}",
            ]);
            
            return response()->json(['success' => true]);
        }

        /**
         * Display the specified resource.
         */
        public function show(Request $request, string $id)
        {
            $healer = \App\Models\Healer::with('plants')->findOrFail($id);

            // return JSON for AJAX requests (edit modal)
            if ($request->wantsJson() || $request->ajax()) {
                $data = $healer->toArray();
                $data['image_url'] = $healer->image ? asset('storage/' . $healer->image) : null;
                return response()->json(['healer' => $data]);
            }

            return view('User.healer_profile', compact('healer'));
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
            $healer = \App\Models\Healer::findOrFail($id);
            $validated = $request->validate([
                'healer_name' => 'required|string|max:255',
                'ethnic_group' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'latitude' => 'nullable|string|max:255',
                'longitude' => 'nullable|string|max:255',
                'specialization' => 'nullable|string|max:255',
                'experience_years' => 'nullable|integer|min:0',
                'languages' => 'nullable|string|max:255',
                'about' => 'nullable|string',
                // allow any common image types and increase size limit to 5MB
                'image' => 'nullable|image|max:5120',
            ]);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage'), $filename);
                $validated['image'] = $filename;
            }
            $healer->update($validated);
            
            // Log admin activity
            Activity::create([
                'user_id' => Auth::id(),
                'description' => "updated healer: {$healer->healer_name}",
            ]);
            
            return response()->json(['success' => true]);
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $healer = \App\Models\Healer::findOrFail($id);
            $healerName = $healer->healer_name;
            $healer->delete();
            
            // Log admin activity
            Activity::create([
                'user_id' => Auth::id(),
                'description' => "deleted healer: {$healerName}",
            ]);
            
            return response()->json(['success' => true]);
        }

        public function search(Request $request)
        {
            $search = $request->input('q');
            $healers = \App\Models\Healer::where('healer_name', 'like', '%' . $search . '%')
                ->orderByRaw('LENGTH(healer_name)')
                ->limit(5)
                ->get(['id', 'healer_name']);
            return response()->json($healers);
        }

        public function publicIndex(Request $request)
        {
            $query = \App\Models\Healer::query();
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('healer_name', 'like', '%' . $search . '%');
            }
            $healers = $query->get();
            return view('User.healers', compact('healers'));
    }
}
