<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceSection;
use Illuminate\Support\Facades\Storage;

class ServiceSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }
    public function index(Request $request, Service $service)
    {
        $sections = $service->sections()->with(['images'])->get();
        return view('dashboard.services.sections.index', compact('sections', 'service'));
    }

    public function create(Request $request, Service $service)
    {
        return view('dashboard.services.sections.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $rules = [
            'ar.title' => ['required'],
            'ar.content' => ['required'],
            // 'en.title' => ['required'],
            // 'en.content' => ['required'],
        ];
        $validatedData = $request->validate($rules);
        $section  = new ServiceSection();
        // $section->translateOrNew('en')->title = $validatedData['en']['title'];
        // $section->translateOrNew('en')->content = $validatedData['en']['content'];
        $section->translateOrNew('ar')->title = $validatedData['ar']['title'];
        $section->translateOrNew('ar')->content = $validatedData['ar']['content'];
        $section->service_id = $service->id;
        $section->save();
        session()->flash('success', 'Section Added Successfully');
        return redirect()->route('dashboard.services.sections.index', $service->id);
    }

    public function edit(ServiceSection $section)
    {
        return view('dashboard.services.sections.edit', compact('section'));
    }

    public function update(Request $request, ServiceSection $section)
    {
        $rules = [
            'ar.title' => ['required'],
            'ar.content' => ['required'],
            // 'en.title' => ['required'],
            // 'en.content' => ['required'],
        ];
        $validatedData = $request->validate($rules);
        $section->translateOrNew('en')->title = $validatedData['en']['title'];
        $section->translateOrNew('en')->content = $validatedData['en']['content'];
        // $section->translateOrNew('ar')->title = $validatedData['ar']['title'];
        // $section->translateOrNew('ar')->content = $validatedData['ar']['content'];
        $section->save();
        session()->flash('success', 'Section Updated Successfully');
        return redirect()->route('dashboard.services.sections.index', $section->service_id);
    }

    public function destroy(ServiceSection $section)
    {
        $section->images->each->deleteTranslations(['ar', 'en']);
        $section->images()->delete();
        Storage::disk('local')->deleteDirectory('photos/services/sections/' . $section->id);
        $section->deleteTranslations(['ar', 'en']);
        $section->delete();
        session()->flash('success', 'Section Deleted Successfully');
        return redirect()->back();
    }
}
