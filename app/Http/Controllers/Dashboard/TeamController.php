<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamRole;
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
        return view('dashboard.team.index', compact('team'));
    }

    public function create(Request $request)
    {
        $teamRoles=TeamRole::all();
        return view('dashboard.team.create', compact('teamRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'team_role_id' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ]);
        $team  = Team::create($request->all());

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
        $team = Team::findOrFail($team);
        $teamRoles=TeamRole::all();
        return view('dashboard.team.edit', compact('team','teamRoles'));
    }

    public function update(Request $request, Team $team)
    {

        $request->validate([
            'name' => 'required',
            'team_role_id' => 'required',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ]);


        $team->update($request->all());

        if ($request->has('image')) {
            Storage::disk('local')->delete($team->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $team->image = $imageFile->storeAs('photos/team', $filename);
        }

        $team->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.team.index');
    }

    public function destroy($team)
    {
        $team = Team::findOrFail($team);
        Storage::disk('local')->delete($team->image);
        $team->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }
}
