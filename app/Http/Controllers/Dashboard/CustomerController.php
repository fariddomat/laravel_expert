<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $users = User::whereRoleIs('client')->with(['customer'])->latest()->paginate(30);
        return view('dashboard.customers.index', compact('users'));
    }
    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'slug' => ['required', 'unique:customers,slug'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'contactUs' => ['nullable'],
            'blogs' => ['nullable'],
            'active' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->active  = $request->has('active') ? 1 : 0;
        $user->save();
        $user->attachRole('client');
        $customer = new Customer();
        $customer->user_id = $user->id;
        $customer->slug = Str::slug($validatedData['slug'], '-');
        $customer->contact_us_form  = $request->has('contactUs') ? 1 : 0;
        $customer->blogs = $request->has('blogs') ? 1 : 0;
        $customer->save();
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $customer->main_image = $image->storePubliclyAs('photos/customers/' . $customer->id, $filename, 's3');
        $customer->save();
        session()->flash('success', 'Customer Added Successfully');
        return redirect()->route('dashboard.customers.index');
    }
    public function edit(User $user)
    {
        return view('dashboard.customers.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $customer = $user->customer;
        $rules = [
            'name' => ['required'],
            'slug' => [
                'required',
                Rule::unique('customers', 'slug')->ignore($customer->id)
            ],
            'email' => [
                'required', 'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => ['nullable', 'min:8'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'contactUs' => ['nullable'],
            'blogs' => ['nullable'],
            'active' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if (isset($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->active  = $request->has('active') ? 1 : 0;
        $user->save();
        $customer->slug = Str::slug($validatedData['slug'], '-');
        if ($request->has('image')) {
            Storage::disk('s3')->delete($customer->main_image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $customer->main_image = $image->storePubliclyAs('photos/customers/' . $customer->id, $filename, 's3');
        }
        $customer->contact_us_form  = $request->has('contactUs') ? 1 : 0;
        $customer->blogs  = $request->has('blogs') ? 1 : 0;
        $customer->save();
        session()->flash('success', 'Customer Updated Successfully');
        return redirect()->route('dashboard.customers.index');
    }

    public function destroy(user $user)
    {
        $customer = $user->customer;
        Storage::disk('s3')->deleteDirectory('photos/customers/' . $customer->id);
        $customer->gallery()->delete();
        $customer->contactUs()->delete();
        $customer->VCardImages()->delete();
        $customer->socialMedia()->delete();
        $customer->delete();
        $user->delete();

        session()->flash('success', 'Customer Deleted Successfully');
        return redirect()->route('dashboard.customers.index');
    }

    public function clients($id)
    {
        // dd(User::find($id));
        $customer = User::find($id)->customer;
            // dd($customer);
        if (!$customer->contact_us_form) {
            return redirect()->back();
        }
        $contacts = $customer->contactUs()->latest()->paginate(50);
        return view('dashboard.customers.client', compact('contacts'));
    }
}
