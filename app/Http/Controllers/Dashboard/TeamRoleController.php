<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TeamRole;
use Illuminate\Http\Request;

class TeamRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamRoles = TeamRole::orderBy('level')->get(); // Fetch all team roles

        return view('dashboard.team.roles.index', compact('teamRoles')); // Pass data to view

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.team.roles.create'); // Display create form view

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validation rules for name
            'level' => 'required|integer', // Validation rules for level
        ]);

        TeamRole::create($request->all()); // Create a new TeamRole model

        return redirect()->route('dashboard.teamRoles.index') // Redirect after creation
                        ->with('success', 'Team Role created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamRole = TeamRole::find($id);

        if (!$teamRole) {
            return abort(404); // Handle non-existent team role
        }

        return view('dashboard.team.roles.edit', compact('teamRole')); // Display edit form view

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validation rules for name
            'level' => 'required|integer', // Validation rules for level
        ]);

        $teamRole = TeamRole::find($id);

        if (!$teamRole) {
            return abort(404); // Handle non-existent team role
        }

        $teamRole->update($request->all()); // Update the team role

        return redirect()->route('dashboard.teamRoles.index') // Redirect after update
                        ->with('success', 'Team Role updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamRole = TeamRole::find($id);

        if (!$teamRole) {
            return abort(404); // Handle non-existent team role
        }

        $teamRole->delete(); // Delete the team role

        return redirect()->route('dashboard.teamRoles.index') // Redirect after deletion
                        ->with('success', 'Team Role deleted successfully!');

    }
}
