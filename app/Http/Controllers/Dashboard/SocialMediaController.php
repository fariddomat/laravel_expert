<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SocialMedia;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $socialMedias = SocialMedia::paginate(10);
        return view('dashboard.socialmedia.index', compact('socialMedias'));
    }

    public function edit(SocialMedia $socialMedia)
    {
        return view('dashboard.socialmedia.edit', compact('socialMedia'));
    }

    public function update(Request $request, SocialMedia $socialMedia)
    {
        $rules = [
            'link' => ['required'],
            'icon' => ['required'],
        ];
        $validatedData = $request->validate($rules);
        $socialMedia->link = $validatedData['link'];
        $socialMedia->icon = $validatedData['icon'];
        $socialMedia->save();
        session()->flash('success', 'Social Media Updated Successfully');
        return redirect()->route('dashboard.socialmedia.index');
    }
}
