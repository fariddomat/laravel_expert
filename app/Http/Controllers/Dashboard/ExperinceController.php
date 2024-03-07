<?php

namespace App\Http\Controllers\Dashboard;

use App\ExperinceSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperinceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request)
    {
        $experinceSlider = ExperinceSlider::all();
        return view('dashboard.experinceSlider.index', compact( 'experinceSlider'));
    }

    public function create(Request $request)
    {
        return view('dashboard.experinceSlider.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $experinceSlider  = new ExperinceSlider();

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $experinceSlider->image = $image->storeAs('photos/experinceSlider', $filename);
        $experinceSlider->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('dashboard.experinceSlider.index');
    }

    public function edit($image)
    {
        // dd($image);
        $image=ExperinceSlider::findOrFail($image);
        return view('dashboard.experinceSlider.edit', compact('image'));
    }

    public function update(Request $request, ExperinceSlider $image)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        if ($request->has('image')) {
            Storage::disk('local')->delete($image->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $image->image = $imageFile->storeAs('photos/experinceSlider', $filename);
        }

        $image->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.experinceSlider.index');
    }

    public function destroy( $image)
    {
        $image=ExperinceSlider::findOrFail($image);
        Storage::disk('local')->delete($image->image);
        $image->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }


}
