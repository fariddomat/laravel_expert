<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations=Location::all();
        return view('dashboard.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.locations.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=> 'required'
        ]);
        Location::create(request()->all());



        session()->flash('success', 'Created Successfully !');
        return redirect()->route('dashboard.locations.index');
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
    public function edit(Location $location)
    {

        return view('dashboard.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {

        $request->validate([
            'name'=>'required',
            'description'=> 'required'
        ]);
        $location->update(request()->all());



        session()->flash('success', 'Update Successfully !');
        return redirect()->route('dashboard.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        session()->flash('success', 'Deleted Successfully !');
        return redirect()->route('dashboard.locations.index');
    }
}
