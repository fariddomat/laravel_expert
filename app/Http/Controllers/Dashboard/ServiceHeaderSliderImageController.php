<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceHeaderSliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceHeaderSliderImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request, Service $service)
    {
        $images = $service->sliderHeaderImages()->get();
        return view('dashboard.services.sliderHeaderImages.index', compact('service', 'images'));
    }

    public function create(Request $request, Service $service)
    {
        return view('dashboard.services.sliderHeaderImages.create', compact('service'));
    }

    public function store(Request $request,  Service $service)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $sliderImage  = new ServiceHeaderSliderImage();

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $sliderImage->image = $image->storeAs('photos/services/sliderHeaderImages/' . $service->id, $filename);

        $sliderImage->showed  = $request->has('showed') ? 1 : 0;
        $sliderImage->service_id = $service->id;
        $sliderImage->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('dashboard.services.sliderHeaderImages.index', $service->id);
    }

    public function edit(ServiceHeaderSliderImage $image)
    {
        return view('dashboard.services.sliderHeaderImages.edit', compact('image'));
    }

    public function update(Request $request, ServiceHeaderSliderImage $image)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        if ($request->has('image')) {
            Storage::disk('local')->delete($image->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $image->image = $imageFile->storeAs('photos/services/sliderHeaderImages/' . $image->service_id, $filename);
        }

        $image->showed  = $request->has('showed') ? 1 : 0;
        $image->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.services.sliderHeaderImages.index', $image->service_id);
    }

    public function destroy(ServiceHeaderSliderImage $image)
    {
        Storage::disk('local')->delete($image->image);
        $image->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }

    public function show(Service $service)
    {
        $sliderImage=ServiceHeaderSliderImage::where('service_id',$service->id);
        $sliderImage->update([
            'showed'=> 1
        ]);
        return redirect()->back();
    }
    public function hide(Service $service)
    {
        $sliderImage=ServiceHeaderSliderImage::where('service_id',$service->id);
        $sliderImage->update([
            'showed'=> 0
        ]);
        return redirect()->back();
    }
}
