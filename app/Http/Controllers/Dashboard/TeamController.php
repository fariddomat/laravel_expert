<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamRole;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request)
    {
        // Schema::table('teams', function (Blueprint $table) {
        //     $table->integer('position')->change();
        //     DB::statement('UPDATE teams SET position = id');
        // });
        // $teams = Team::orderBy('id')->get();
        // $i=1;
        // foreach ($teams as $team) {
        //     $team->position=$i;
        //     $i++;
        //     $team->save();
        // }
        $team = Team::orderBy('position')->get();
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


        $helper = new ImageHelper;
        $image = $request->file('image');
        $directory = '/photos/team';
        $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
        $team->image = $fullPath;

        $team->position = Team::max('position') + 1;
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
            $helper = new ImageHelper;
            $helper->removeImageInPublicDirectory($team->image);
            $image = $request->file('image');
            $directory = '/photos/team';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
            $team->image = $fullPath;
        }

        $team->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.team.index');
    }

    public function destroy($team)
    {
        $team = Team::findOrFail($team);
        $p=$team->position;
        Storage::disk('local')->delete($team->image);

        $team->delete();
        $teams = Team::where('position', '>', $p)->get();
        foreach ($teams as $team) {
            $team->position--;
            $team->save();
        }

        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }

    public function reorder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|integer',
            'to' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => '0']);
        }
        $from = $request->from;
        $to = $request->to;
        $movedTeam = Team::where('position', $from)->first();
        $toTeam = Team::where('position', $to)->first();
        // if ($movedTeam == null || $toTeam == null) {
        //     return response()->json(['status' => '0']);
        // }
        // dd($from);
        if ($from < $to) {
            $teams = Team::whereBetween('position', [$from + 1, $to])->get();
            foreach ($teams as $team) {
                $team->decrement('position');
            }
            $movedTeam->position = $to;
            $movedTeam->save();
        } else if ($from > $to) {
            $teams = Team::whereBetween('position', [$to, $from - 1])->get();
            foreach ($teams as $team) {
                $team->increment('position');
            }
            $movedTeam->position = $to;
            $movedTeam->save();
        }
        return response()->json(['status' => '1']);
    }
}
