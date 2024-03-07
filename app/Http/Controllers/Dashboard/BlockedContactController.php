<?php

namespace App\Http\Controllers\Dashboard;

use App\BlockedContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockedContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=BlockedContact::paginate(50);
        return view('dashboard.blocked_contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blocked_contacts.create');

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
            'name'=>'nullable',
            'email'=>'nullable|email',
            'message'=>'nullable',
        ]);
        $block=BlockedContact::create();
        $block->name=$request->name;
        $block->email=$request->email;
        $block->message=$request->message;
        $block->save();

        session()->flash('success', 'Contact Blocked Successfully');
        return redirect()->route('dashboard.blocked_contact.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=BlockedContact::find($id);
        if ($contact) {
            $contact->delete();
            session()->flash('success', 'Contact Us Deleted Successfully');
            return redirect()->route('dashboard.blocked_contact.index');
        }else {
            abort(404);
        }

    }
}
