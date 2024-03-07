<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\CustomerSocialMedia;

class SocialMediaController extends Controller
{
    protected  $social;
    protected  $socialIcons;

    public function __construct()
    {
        $this->middleware(['role:client']);
        $this->social = ['Facebook', 'Twitter', 'Linkedin', 'Snapchat', 'Instagram', 'YouTube', 'TikTok'];
        $this->socialIcons = [
            'Facebook' => 'fa-facebook-f',
            'Twitter' => 'fa-twitter',
            'Linkedin' => 'fa-linkedin',
            'Snapchat' => 'fa-snapchat',
            'Instagram' => 'fa-instagram',
            'YouTube' => 'fa-youtube',
            'TikTok' => 'fa-tiktok',
        ];
    }

    public function index()
    {
        $customer = auth()->user()->customer;
        $socialMedias = $customer->socialMedia;
        return view('customers.socialmedia.index', compact('socialMedias'));
    }

    public function create()
    {
        $socialMedias = $this->social;
        return view('customers.socialmedia.create', compact('socialMedias'));
    }

    public function store(Request $request)
    {
        $rules = [
            'socialMedias' => [
                'required',
                Rule::in($this->social),
            ],
            'link' => ['required', 'url'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $customer = auth()->user()->customer;
        $socialMedia = new CustomerSocialMedia();
        $socialMedia->name = $validatedData['socialMedias'];
        $socialMedia->icon = $this->socialIcons[$validatedData['socialMedias']];
        $socialMedia->link = $validatedData['link'];
        $socialMedia->showed  = $request->has('showed') ? 1 : 0;
        $socialMedia->customer_id = $customer->id;
        $socialMedia->save();
        session()->flash('success', 'Social Media Added Successfully');
        return redirect()->route('customers.dashboard.socialmedia.index');
    }

    public function edit(CustomerSocialMedia $socialMedia)
    {
        $this->authorize('update', $socialMedia);
        $socialMedias = $this->social;
        return view('customers.socialmedia.edit', compact('socialMedia', 'socialMedias'));
    }

    public function update(Request $request, CustomerSocialMedia $socialMedia)
    {
        $this->authorize('update', $socialMedia);
        $rules = [
            'socialMedias' => [
                'required',
                Rule::in($this->social),
            ],
            'link' => ['required', 'url'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $socialMedia->name = $validatedData['socialMedias'];
        $socialMedia->icon = $this->socialIcons[$validatedData['socialMedias']];
        $socialMedia->link = $validatedData['link'];
        $socialMedia->showed  = $request->has('showed') ? 1 : 0;
        $socialMedia->save();
        session()->flash('success', 'Social Media Updated Successfully');
        return redirect()->route('customers.dashboard.socialmedia.index');
    }
}
