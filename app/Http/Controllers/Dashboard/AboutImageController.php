<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\AboutImage;

class AboutImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }
    public function index()
    {
        $images = AboutImage::paginate(10);
        return view('dashboard.aboutimages.index', compact('images'));
    }
    public function create()
    {
        return view('dashboard.aboutimages.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $aboutImage = new AboutImage();
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $aboutImage->image = $image->storeAs('photos/about', $filename);
        $aboutImage->showed  = $request->has('showed') ? 1 : 0;
        $aboutImage->save();
        session()->flash('success', 'About Image Added Successfully');
        return redirect()->route('dashboard.aboutimages.index');
    }

    public function edit(AboutImage $aboutimage)
    {
        return view('dashboard.aboutimages.edit', compact('aboutimage'));
    }

    public function update(Request $request, AboutImage $aboutimage)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        if ($request->has('image')) {
            Storage::disk('local')->delete($aboutimage->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $aboutimage->image = $image->storeAs('photos/about', $filename);
        }
        $aboutimage->showed  = $request->has('showed') ? 1 : 0;
        $aboutimage->save();
        session()->flash('success', 'About Image Updated Successfully');
        return redirect()->route('dashboard.aboutimages.index');
    }
}
