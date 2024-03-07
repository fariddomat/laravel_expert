<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ServiceSection;
use App\ServiceSectionImage;
use Illuminate\Support\Facades\Storage;

class ServiceSectionImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request, ServiceSection $section)
    {
        $images = $section->images()->get();
        return view('dashboard.services.sections.images.index', compact('section', 'images'));
    }

    public function create(Request $request, ServiceSection $section)
    {
        return view('dashboard.services.sections.images.create', compact('section'));
    }

    public function store(Request $request,  ServiceSection $section)
    {
        $rules = [
            'ar.caption' => ['required'],
            // 'en.caption' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);
        $sectionImage  = new ServiceSectionImage();
        // $sectionImage->translateOrNew('en')->caption = $validatedData['en']['caption'];
        $sectionImage->translateOrNew('ar')->caption = $validatedData['ar']['caption'];

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $sectionImage->image = $image->storeAs('photos/services/sections/' . $section->id, $filename);

        $sectionImage->service_section_id = $section->id;
        $sectionImage->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('dashboard.services.sections.images.index', $section->id);
    }

    public function edit(ServiceSectionImage $image)
    {
        return view('dashboard.services.sections.images.edit', compact('image'));
    }

    public function update(Request $request, ServiceSectionImage $image)
    {
        $rules = [
            'ar.caption' => ['required'],
            // 'en.caption' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        // $image->translateOrNew('en')->caption = $validatedData['en']['caption'];
        $image->translateOrNew('ar')->caption = $validatedData['ar']['caption'];

        if ($request->has('image')) {
            Storage::disk('local')->delete($image->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $image->image = $imageFile->storeAs('photos/services/sections/' . $image->service_section_id, $filename);
        }

        $image->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('dashboard.services.sections.images.index', $image->service_section_id);
    }

    public function destroy(ServiceSectionImage $image)
    {
        Storage::disk('local')->delete($image->image);
        $image->deleteTranslations(['ar', 'en']);
        $image->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->back();
    }
}
