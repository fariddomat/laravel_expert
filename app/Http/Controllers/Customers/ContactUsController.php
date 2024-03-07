<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\CustomerContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:client']);
    }

    public function index()
    {
        $customer = Auth::user()->customer;
        if (!$customer->contact_us_form) {
            return redirect()->route('customers.dashboard.home');
        }
        $contacts = $customer->contactUs()->latest()->paginate(50);
        return view('customers.contactUs.index', compact('contacts'));
    }

    public function destroy(CustomerContactUs $contactus)
    {
        $this->authorize('update', $contactus);
        $contactus->delete();
        session()->flash('success', 'Contact Us Deleted Successfully');
        return redirect()->route('customers.dashboard.contactUs.index');
    }

    public function changeStatus(Request $request, CustomerContactUs $contactus)
    {
        $this->authorize('update', $contactus);
        $contactus->status = 2; //done
        $contactus->save();
        $response = [
            'status' => 1,
            'message' => 'Status Changed',
        ];
        return response()->json($response);
    }
}
