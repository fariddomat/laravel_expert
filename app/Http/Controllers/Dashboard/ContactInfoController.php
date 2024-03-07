<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactInfo;

class ContactInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function create()
    {
        $contactInfo = ContactInfo::first();
        return view('dashboard.contactinfo.create', compact('contactInfo'));
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.location' => ['required'],
            // 'en.location' => ['required'],
            'mobile' => ['required'],
            'whatsapp' => ['required'],
            'email' => ['required'],
            'location_link' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $contactInfo = ContactInfo::find(1);
        $contactInfo->mobile = $validatedData['mobile'];
        $contactInfo->whatsapp = $validatedData['whatsapp'];
        $contactInfo->email = $validatedData['email'];
        $contactInfo->location_link = $validatedData['location_link'];
        // $contactInfo->translateOrNew('en')->location = $validatedData['en']['location'];
        $contactInfo->translateOrNew('ar')->location = $validatedData['ar']['location'];
        $contactInfo->save();
        session()->flash('success', 'Contact Info Updated Successfully');
        return redirect()->route('dashboard.home');
    }
}
