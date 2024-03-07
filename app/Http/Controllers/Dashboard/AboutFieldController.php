<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutField;

class AboutFieldController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $aboutFields = AboutField::all();
        return view('dashboard.aboutfields.index', compact('aboutFields'));
    }

    public function create()
    {
        return view('dashboard.aboutfields.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.title' => ['required'],
            'ar.value' => ['required'],

            // 'en.title' => ['required'],
            // 'en.value' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $aboutField = new AboutField();
        $aboutField->translateOrNew('ar')->title = $validatedData['ar']['title'];
        $aboutField->translateOrNew('ar')->value = $validatedData['ar']['value'];

        // $aboutField->translateOrNew('en')->value = $validatedData['en']['value'];
        // $aboutField->translateOrNew('en')->title = $validatedData['en']['title'];
        $aboutField->save();
        session()->flash('success', 'About Field Added Successfully');
        return redirect()->route('dashboard.aboutfields.index');
    }

    public function edit(AboutField $aboutfield)
    {
        return view('dashboard.aboutfields.edit', compact('aboutfield'));
    }

    public function update(Request $request, AboutField $aboutfield)
    {
        $rules = [
            'ar.title' => ['required'],
            'ar.value' => ['required'],
            // 'en.title' => ['required'],
            // 'en.value' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $aboutfield->translate('ar')->title = $validatedData['ar']['title'];
        $aboutfield->translate('ar')->value = $validatedData['ar']['value'];

        // $aboutfield->translate('en')->title = $validatedData['en']['title'];
        // $aboutfield->translate('en')->value = $validatedData['en']['value'];
        $aboutfield->save();
        session()->flash('success', 'About Field Updated Successfully');
        return redirect()->route('dashboard.aboutfields.index');
    }

    public function destroy(AboutField $aboutfield)
    {
        $aboutfield->deleteTranslations(['ar', 'en']);
        $aboutfield->delete();
        session()->flash('success', 'About Field Deleted Successfully');
        return redirect()->route('dashboard.aboutfields.index');
    }
}
