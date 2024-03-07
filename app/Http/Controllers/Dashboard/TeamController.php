<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request)
    {
        $team = Team::all();
        return view('dashboard.team.index', compact( 'team'));
    }

    public function create(Request $request)
    {
        return view('dashboard.team.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $team  = new Team();

        $team->name=$request->name;
        $team->title=$request->title;
        $team->description=$request->description;

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $team->image = $image->storeAs('photos/team', $filename);
        $team->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('dashboard.team.index');
    }

    public function edit($team)
    {
        // dd($team);
        $team=Team::findOrFail($team);
        return view('dashboard.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        if ($request->has('image')) {
            Storage::disk('local')->delete($team->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $team->image = $imageFile->storeAs('photos/team', $filename);
        }
        $team->name=$request->name;
        $team->title=$request->title;
        $team->description=$request->description;
        $team->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.team.index');
    }

    public function destroy( $team)
    {
        $team=Team::findOrFail($team);
        Storage::disk('local')->delete($team->image);
        $team->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }


}
