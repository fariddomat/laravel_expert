<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use App\ServiceSection;
use App\ServiceSliderImage;
use App\ServiceSectionImage;
use Illuminate\Support\Facades\Storage;

class ServiceSliderImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request, $id)
    {
        // dd(true);
        $service=Service::findOrFail($id);
        $images = $service->sliderImages()->get();
        return view('dashboard.services.sliderImages.index', compact('service', 'images'));
    }

    public function create(Request $request, Service $service)
    {
        return view('dashboard.services.sliderImages.create', compact('service'));
    }

    public function store(Request $request,  Service $service)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $sliderImage  = new ServiceSliderImage();

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $sliderImage->image = $image->storeAs('photos/services/sliderImages/' . $service->id, $filename);

        $sliderImage->showed  = $request->has('showed') ? 1 : 0;
        $sliderImage->service_id = $service->id;
        $sliderImage->slider = $request->slider;
        $sliderImage->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('dashboard.services.sliderImages.index', $service->id);
    }

    public function edit(ServiceSliderImage $image)
    {
        return view('dashboard.services.sliderImages.edit', compact('image'));
    }

    public function update(Request $request, ServiceSliderImage $image)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        if ($request->has('image')) {
            Storage::disk('local')->delete($image->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $image->image = $imageFile->storeAs('photos/services/sliderImages/' . $image->service_id, $filename);
        }

        $image->showed  = $request->has('showed') ? 1 : 0;
        $image->slider = $request->slider;

        $image->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.services.sliderImages.index', $image->service_id);
    }

    public function destroy(ServiceSliderImage $image)
    {
        Storage::disk('local')->delete($image->image);
        $image->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }

    public function show(Service $service)
    {
        $sliderImage=ServiceSliderImage::where('service_id',$service->id);
        $sliderImage->update([
            'showed'=> 1
        ]);
        return redirect()->back();
    }
    public function hide(Service $service)
    {
        $sliderImage=ServiceSliderImage::where('service_id',$service->id);
        $sliderImage->update([
            'showed'=> 0
        ]);
        return redirect()->back();
    }


    public function slider(Service $service, Request $request)
    {
        $service->update([
            'slider1' => $request->slider1,
            'slider2' => $request->slider2,
            'slider3' => $request->slider3,
        ]);
        return redirect()->back();
    }
}
