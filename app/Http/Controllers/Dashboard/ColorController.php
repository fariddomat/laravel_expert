<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function create()
    {
        $color = Color::first();
        return view('dashboard.color.create', compact('color'));
    }

    public function store(Request $request)
    {
        $rules = [
            'menu' => ['required'],
            'footer' => ['required'],
            'logo_border' => ['required'],
            'home_buttons' => ['required'],
            'contact_button' => ['required'],
            'menu_social_media' => ['required'],
        ];

        $validatedData = $request->validate($rules);

        $color =  Color::find(1);
        if (is_null($color)) {
            $color = new Color();
        }

        $color->menu = $validatedData['menu'];
        $color->footer = $validatedData['footer'];
        $color->logo_border = $validatedData['logo_border'];
        $color->home_buttons = $validatedData['home_buttons'];
        $color->contact_button = $validatedData['contact_button'];
        $color->menu_social_media = $validatedData['menu_social_media'];
        $color->save();
        session()->flash('success', 'Color Updated Successfully');
        return redirect()->route('dashboard.home');
    }
}
