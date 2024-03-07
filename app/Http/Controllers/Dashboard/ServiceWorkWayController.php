<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceWorkWay;

class ServiceWorkWayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request, Service $service)
    {
        $workWays = $service->workWays()->get();
        return view('dashboard.services.workways.index', compact('workWays', 'service'));
    }

    public function create(Request $request, Service $service)
    {
        return view('dashboard.services.workways.create', compact('service'));
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
        $work  = new ServiceWorkWay();
        $work->translateOrNew('en')->title = $validatedData['en']['title'];
        $work->translateOrNew('en')->content = $validatedData['en']['content'];
        // $work->translateOrNew('ar')->title = $validatedData['ar']['title'];
        // $work->translateOrNew('ar')->content = $validatedData['ar']['content'];
        $work->service_id = $service->id;
        $work->save();
        session()->flash('success', 'Work Way Added Successfully');
        return redirect()->route('dashboard.services.workways.index', $service->id);
    }

    public function edit(ServiceWorkWay $workway)
    {
        return view('dashboard.services.workways.edit', compact('workway'));
    }

    public function update(Request $request, ServiceWorkWay $workway)
    {
        $rules = [
            'ar.title' => ['required'],
            'ar.content' => ['required'],
            // 'en.title' => ['required'],
            // 'en.content' => ['required'],
        ];
        $validatedData = $request->validate($rules);
        // $workway->translateOrNew('en')->title = $validatedData['en']['title'];
        // $workway->translateOrNew('en')->content = $validatedData['en']['content'];
        $workway->translateOrNew('ar')->title = $validatedData['ar']['title'];
        $workway->translateOrNew('ar')->content = $validatedData['ar']['content'];
        $workway->save();
        session()->flash('success', 'Work Way Updated Successfully');
        return redirect()->route('dashboard.services.workways.index', $workway->service_id);
    }

    public function destroy(ServiceWorkWay $workway)
    {
        $workway->deleteTranslations(['ar', 'en']);
        $workway->delete();
        session()->flash('success', 'Work Way Deleted Successfully');
        return redirect()->back();
    }
}
