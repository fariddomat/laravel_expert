<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\VCardImage;
use App\Customer;

class VCardImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }
    public function index(Request $request, Customer $customer)
    {
        $images = $customer->VCardImages()->paginate(10);
        return view('dashboard.vcardimages.index', compact('images', 'customer'));
    }
    public function create(Request $request, Customer $customer)
    {
        return view('dashboard.vcardimages.create', compact('customer'));
    }

    public function store(Request $request, Customer $customer)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $vcardImage = new VCardImage();
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $vcardImage->image = $image->storePubliclyAs('photos/customers/' . $customer->id . '/vcard', $filename, 's3');
        $vcardImage->showed  = $request->has('showed') ? 1 : 0;
        $vcardImage->customer_id = $customer->id;
        $vcardImage->save();
        session()->flash('success', 'VCard Image Added Successfully');
        return redirect()->route('dashboard.customers.vcardimages.index', $customer->id);
    }
    public function edit(VCardImage $vcardimage)
    {
        return view('dashboard.vcardimages.edit', compact('vcardimage'));
    }

    public function update(Request $request, VCardImage $vcardimage)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        if ($request->has('image')) {
            Storage::disk('s3')->delete($vcardimage->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $vcardimage->image = $image->storePubliclyAs(dirname($vcardimage->image), $filename, 's3');
        }
        $vcardimage->showed  = $request->has('showed') ? 1 : 0;
        $vcardimage->save();
        session()->flash('success', 'VCard Image Updated Successfully');
        return redirect()->route('dashboard.customers.vcardimages.index', $vcardimage->customer->id);
    }
    public function destroy(VCardImage $vcardimage)
    {
        Storage::disk('s3')->delete($vcardimage->image);
        $vcardimage->delete();
        session()->flash('success', 'VCard Image Deleted Successfully');
        return redirect()->back();
    }
}
