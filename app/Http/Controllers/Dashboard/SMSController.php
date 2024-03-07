<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SMS;
use App\GlobalSMS;

class SMSController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function createContact()
    {
        $sms = SMS::where('type', 'contact')->first();
        $globalSms = GlobalSMS::first();
        return view('dashboard.sms.createContact', compact('sms', 'globalSms'));
    }

    public function storeContact(Request $request)
    {
        $rules = [
            'body' => ['required'],
            'admin_number' => ['required'],
            'admin_message' => ['required'],
            'status' => ['nullable'],
            'globalStatus' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $sms = SMS::where('type', 'contact')->first();
        $sms->status  = $request->has('status') ? 1 : 0;
        $sms->body = $validatedData['body'];
        $sms->admin_number = $validatedData['admin_number'];
        $sms->admin_message = $validatedData['admin_message'];
        $sms->save();
        $globalSms = GlobalSMS::first();
        $globalSms->status  = $request->has('globalStatus') ? 1 : 0;
        $globalSms->save();
        session()->flash('success', 'SMS Info Updated Successfully');
        return redirect()->route('dashboard.sms.contact.create');
    }

    public function createService()
    {
        $sms = SMS::where('type', 'service')->first();
        $globalSms = GlobalSMS::first();
        return view('dashboard.sms.createService', compact('sms', 'globalSms'));
    }

    public function storeService(Request $request)
    {
        $rules = [
            'body' => ['required'],
            'admin_number' => ['required'],
            'admin_message' => ['required'],
            'status' => ['nullable'],
            'globalStatus' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $sms = SMS::where('type', 'service')->first();
        $sms->status  = $request->has('status') ? 1 : 0;
        $sms->body = $validatedData['body'];
        $sms->admin_number = $validatedData['admin_number'];
        $sms->admin_message = $validatedData['admin_message'];
        $sms->save();
        $globalSms = GlobalSMS::first();
        $globalSms->status  = $request->has('globalStatus') ? 1 : 0;
        $globalSms->save();
        session()->flash('success', 'SMS Info Updated Successfully');
        return redirect()->route('dashboard.sms.service.create');
    }

    public function createLarid()
    {
        $sms = SMS::where('type', 'larid')->first();
        $globalSms = GlobalSMS::first();
        return view('dashboard.sms.createLarid', compact('sms', 'globalSms'));
    }

    public function storeLarid(Request $request)
    {
        $rules = [
            'body' => ['required'],
            'admin_number' => ['required'],
            'admin_message' => ['required'],
            'status' => ['nullable'],
            'globalStatus' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $sms = SMS::where('type', 'larid')->first();
        $sms->status  = $request->has('status') ? 1 : 0;
        $sms->body = $validatedData['body'];
        $sms->admin_number = $validatedData['admin_number'];
        $sms->admin_message = $validatedData['admin_message'];
        $sms->save();
        $globalSms = GlobalSMS::first();
        $globalSms->status  = $request->has('globalStatus') ? 1 : 0;
        $globalSms->save();
        session()->flash('success', 'SMS Info Updated Successfully');
        return redirect()->route('dashboard.sms.larid.create');
    }
}
