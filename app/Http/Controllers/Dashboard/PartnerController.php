<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\PartnerSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request)
    {
        $partnerSlider = PartnerSlider::all();
        return view('dashboard.partnerSlider.index', compact( 'partnerSlider'));
    }

    public function create(Request $request)
    {
        return view('dashboard.partnerSlider.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $partnerSlider  = new PartnerSlider();

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $partnerSlider->image = $image->storeAs('photos/partnerSlider', $filename);
        $partnerSlider->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('dashboard.partnerSlider.index');
    }

    public function edit($image)
    {
        // dd($image);
        $image=PartnerSlider::findOrFail($image);
        return view('dashboard.partnerSlider.edit', compact('image'));
    }

    public function update(Request $request, PartnerSlider $image)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        if ($request->has('image')) {
            Storage::disk('local')->delete($image->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $image->image = $imageFile->storeAs('photos/partnerSlider', $filename);
        }

        $image->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.partnerSlider.index');
    }

    public function destroy( $image)
    {
        $image=PartnerSlider::findOrFail($image);
        Storage::disk('local')->delete($image->image);
        $image->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }
}
