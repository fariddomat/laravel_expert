<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:client']);
    }

    public function create()
    {
        $customer = auth()->user()->customer;
        return view('customers.basicinfo.create', compact('customer'));
    }
    public function store(Request $request)
    {
        $rules = [
            'ar.name' => ['required'],
            'en.name' => ['required'],
            'ar.about' => ['required'],
            'en.about' => ['required'],
            'ar.location' => ['required'],
            'en.location' => ['required'],
            'location_link' => ['required'],
            'ar.services' => ['required'],
            'en.services' => ['required'],
            'mobile' => ['required'],
            'whatsapp' => ['nullable'],
            'received_email' => ['nullable'],
            'land_number' => ['nullable'],
            'sms_number' => ['nullable'],
            'email' => ['required', 'email'],
            'website' => ['nullable'],
            'website_name' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $customer = auth()->user()->customer;
        $customer->translateOrNew('ar')->name = $validatedData['ar']['name'];
        $customer->translateOrNew('en')->name = $validatedData['en']['name'];
        $customer->translateOrNew('ar')->about = $validatedData['ar']['about'];
        $customer->translateOrNew('en')->about = $validatedData['en']['about'];
        $customer->translateOrNew('ar')->location = $validatedData['ar']['location'];
        $customer->translateOrNew('en')->location = $validatedData['en']['location'];
        $customer->translateOrNew('ar')->services = $validatedData['ar']['services'];
        $customer->translateOrNew('en')->services = $validatedData['en']['services'];
        $customer->mobile = $validatedData['mobile'];
        $customer->whatsapp = $validatedData['whatsapp'] ?? '';
        $customer->received_email = $validatedData['received_email'] ?? NULL;
        $customer->land_number = $validatedData['land_number'] ?? '';
        $customer->sms_number = $validatedData['sms_number'] ?? '';
        $customer->email = $validatedData['email'];
        $customer->website = $validatedData['website'] ?? NULL;
        $customer->website_name = $validatedData['website_name'] ?? NULL;
        $customer->location_link = $validatedData['location_link'];
        $customer->save();
        session()->flash('success', 'Basic Info Updated Successfully');
        return redirect()->route('customers.dashboard.basicinfo.create');
    }
}
