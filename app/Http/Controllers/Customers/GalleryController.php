<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CustomerGallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:client']);
    }

    public function index()
    {
        $images = Auth::user()->customer->gallery;
        return view('customers.gallery.index', compact('images'));
    }
    public function create()
    {
        return view('customers.gallery.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $customer = Auth::user()->customer;
        $gallery = new CustomerGallery();
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $gallery->image = $image->storePubliclyAs('photos/customers/' . $customer->id . '/gallery', $filename, 's3');
        $gallery->showed  = $request->has('showed') ? 1 : 0;
        $gallery->customer_id = $customer->id;
        $gallery->save();
        session()->flash('success', 'Image Added Successfully');
        return redirect()->route('customers.dashboard.gallery.index');
    }
    public function edit(CustomerGallery $image)
    {
        $this->authorize('update', $image);
        return view('customers.gallery.edit', compact('image'));
    }

    public function update(Request $request, CustomerGallery $image)
    {
        $this->authorize('update', $image);
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        if ($request->has('image')) {
            Storage::disk('s3')->delete($image->image);
            $imageFile = $request->file('image');
            $filename = $imageFile->getClientOriginalName();
            $image->image = $imageFile->storePubliclyAs(dirname($image->image), $filename, 's3');
        }
        $image->showed  = $request->has('showed') ? 1 : 0;
        $image->save();
        session()->flash('success', 'Image Updated Successfully');
        return redirect()->route('customers.dashboard.gallery.index');
    }
    public function changeStatus(Request $request, CustomerGallery $image)
    {
        $this->authorize('update', $image);
        $message = 'Hide';
        if ($image->showed == 1) {
            $image->showed = 0;
            $message = 'Show';
        } else {
            $image->showed = 1;
        }
        $image->save();
        $response = [
            'status' => 1,
            'message' => $message,
        ];
        return response()->json($response);
    }
    public function destroy(CustomerGallery $image)
    {
        $this->authorize('update', $image);
        Storage::disk('s3')->delete($image->image);
        $image->delete();
        session()->flash('success', 'Image Deleted Successfully');
        return redirect()->route('customers.dashboard.gallery.index');
    }
}
