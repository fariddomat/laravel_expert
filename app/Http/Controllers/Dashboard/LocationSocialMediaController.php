<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LocationSocialMedia;
use Illuminate\Http\Request;

class LocationSocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Location $location)
    {
        $socials=LocationSocialMedia::where('location_id', $location->id)->latest()->get();
        return view('dashboard.locations.socials.index', compact('location','socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Location $location)
    {

        return view('dashboard.locations.socials.create', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Location $location, Request $request)
    {
        $request->validate([
            'location_id' => 'required',
            'name' => 'required',
            'link' => 'required',
            'icon' => 'required',
        ]);
        LocationSocialMedia::create($request->all());
        session()->flash('success', 'social Added Successfully');
        return redirect()->route('dashboard.locations.socials.index', $location);

    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location, LocationSocialMedia $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location,  LocationSocialMedia $social)
    {

        return view('dashboard.locations.socials.edit', compact('location', 'social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location,  LocationSocialMedia $social)
    {

        $request->validate([
            'location_id' => 'required',
            'name' => 'required',
            'link' => 'required',
            'icon' => 'required',
        ]);
        $social->update($request->all());
        session()->flash('success', 'social updated Successfully');
        return redirect()->route('dashboard.locations.socials.index', $location);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location , LocationSocialMedia $social)
    {
        $social->delete();

        session()->flash('success', 'social Deleted Successfully');
        return redirect()->back();
    }
}
