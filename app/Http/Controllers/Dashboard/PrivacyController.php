<?php

namespace App\Http\Controllers\Dashboard;

use App\About;
use App\Http\Controllers\Controller;
use App\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function create()
    {
        $privacy = Privacy::first();
        return view('dashboard.privacy.create', compact('privacy'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'ar' => ['required'],
            // 'en' => ['required'],
        ]);
        $privacy =  Privacy::firstOrNew();

        $privacy->ar=$request->ar;
        // $privacy->en=$request->en;
        $privacy->save();
        session()->flash('success', 'Privacy Updated Successfully');
        return redirect()->back();
    }
}
