<?php

namespace App\Http\Controllers\Dashboard;

use App\HomeSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request)
    {
        $homeinfoSliderImages = HomeSlider::all();
        return view('dashboard.homeinfo.sliderImages.index', compact( 'homeinfoSliderImages'));
    }

    public function create(Request $request)
    {
        return view('dashboard.homeinfo.sliderImages.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'lang'=>'required',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $homeSlider  = new HomeSlider();
        $homeSlider->lang=$request->lang;
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $homeSlider->image = $image->storeAs('photos/homeSlider', $filename);
        $homeSlider->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('dashboard.homeinfoSliderImages.index');
    }

    public function edit($image)
    {
        // dd($image);
        $image=HomeSlider::findOrFail($image);
        return view('dashboard.homeinfo.sliderImages.edit', compact('image'));
    }

    public function update(Request $request, HomeSlider $image)
    {
        $rules = [
            'lang'=>'required',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $image->lang=$request->lang;

        if ($request->has('image')) {
            Storage::disk('local')->delete($image->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $image->image = $imageFile->storeAs('photos/homeSlider', $filename);
        }

        $image->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.homeinfoSliderImages.index');
    }

    public function destroy( $image)
    {
        $image=HomeSlider::findOrFail($image);
        Storage::disk('local')->delete($image->image);
        $image->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }


}
