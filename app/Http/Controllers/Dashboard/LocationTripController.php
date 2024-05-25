<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LocationTrip;
use Illuminate\Http\Request;

class LocationTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Location $location)
    {
        $trips=LocationTrip::where('location_id', $location->id)->latest()->get();
        return view('dashboard.locations.trips.index', compact('location','trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Location $location)
    {

        return view('dashboard.locations.trips.create', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Location $location, Request $request)
    {

        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'title' => 'required|string|max:191',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        $trip=LocationTrip::create($request->except('img'));
        if ($request->has('img')) {
            $helper = new ImageHelper;
            $image = $request->file('img');
            $directory = '/photos/trips';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 600, 600);
            $trip->img = $fullPath;
        }
        $trip->save();
        session()->flash('success', 'Trip Added Successfully');
        return redirect()->route('dashboard.locations.trips.index', $location);

    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location, LocationTrip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location,  LocationTrip $trip)
    {

        return view('dashboard.locations.trips.edit', compact('location', 'trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location,  LocationTrip $trip)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'title' => 'required|string|max:191',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $trip->update($request->except('img'));
        if ($request->has('img')) {
            $helper = new ImageHelper;
            $image = $request->file('img');
            $directory = '/photos/trips';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 600, 600);
            $trip->img = $fullPath;
        }
        $trip->save();

        session()->flash('success', 'Trip updated Successfully');
        return redirect()->route('dashboard.locations.trips.index', $location);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location , LocationTrip $trip)
    {
        $trip->delete();

        session()->flash('success', 'Trip Deleted Successfully');
        return redirect()->back();
    }
}
