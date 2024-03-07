<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function create()
    {
        $about = About::first();
        return view('dashboard.about.create', compact('about'));
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.about_me' => ['required'],
            'ar.brief' => ['required'],
            'ar.who' => ['required'],
            'ar.history' => ['required'],
            'ar.massage' => ['required'],
            'ar.goals' => ['required'],
            'ar.vision' => ['required'],
            'ar.ambition' => ['required'],
            'ar.values' => ['required'],

            // 'en.about_me' => ['required'],
            // 'en.brief' => ['required'],
            // 'en.who' => ['required'],
            // 'en.history' => ['required'],
            // 'en.massage' => ['required'],
            // 'en.goals' => ['required'],
            // 'en.vision' => ['required'],
            // 'en.ambition' => ['required'],
            // 'en.values' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $about =  About::firstOrNew();

        $about->translateOrNew('ar')->about_me = $validatedData['ar']['about_me'];
        $about->translateOrNew('ar')->brief = $validatedData['ar']['brief'];
        $about->translateOrNew('ar')->who_are_we = $validatedData['ar']['who'];
        $about->translateOrNew('ar')->history = $validatedData['ar']['history'];
        $about->translateOrNew('ar')->massage = $validatedData['ar']['massage'];
        $about->translateOrNew('ar')->goals = $validatedData['ar']['goals'];
        $about->translateOrNew('ar')->ambition = $validatedData['ar']['ambition'];
        $about->translateOrNew('ar')->vision = $validatedData['ar']['vision'];
        $about->translateOrNew('ar')->values = $validatedData['ar']['values'];

        // $about->translateOrNew('en')->about_me = $validatedData['en']['about_me'];
        // $about->translateOrNew('en')->brief = $validatedData['en']['brief'];
        // $about->translateOrNew('en')->who_are_we = $validatedData['en']['who'];
        // $about->translateOrNew('en')->history = $validatedData['en']['history'];
        // $about->translateOrNew('en')->massage = $validatedData['en']['massage'];
        // $about->translateOrNew('en')->goals = $validatedData['en']['goals'];
        // $about->translateOrNew('en')->vision = $validatedData['en']['vision'];
        // $about->translateOrNew('ar')->ambition = $validatedData['ar']['ambition'];
        // $about->translateOrNew('en')->values = $validatedData['en']['values'];
        $about->save();
        session()->flash('success', 'About Updated Successfully');
        return redirect()->route('dashboard.home');
    }
}
