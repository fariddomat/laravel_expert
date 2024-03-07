<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUs;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $contacts = ContactUs::with(['services'])->latest()->paginate(50);
        return view('dashboard.contact-us.index', compact('contacts'));
    }

    public function destroy(ContactUs $contactus)
    {
        $contactus->delete();
        session()->flash('success', 'Contact Us Deleted Successfully');
        return redirect()->route('dashboard.contact-us.index');
    }
    public function changeStatus(Request $request, ContactUs $contactus)
    {
        $contactus->status = 2; //done
        $contactus->save();
        $response = [
            'status' => 1,
            'message' => 'Status Changed',
        ];
        return response()->json($response);
    }

    public function note(Request $request, ContactUs $contactus)
    {
        $contactus->note = $request->note; //done
        $contactus->save();
        session()->flash('success', 'Contact Us Note Updated Successfully');
        return redirect()->back();
    }
}
