<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\App;
use App\Helpers\Helper;
use App\CustomerContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerContactUs as ContactUsMail;
use App\CustomerBlog;
use App\CustomerBlogCategory;

class CustomerController extends Controller
{
    public function __construct()
    {
    }

    public function show(Request $request,  Customer $customer)
    {
        if (!$customer->user->active) {
            return redirect()->route('eCardOff');
        }
        $vcardImages = $customer->showedVCardImages;
        $locale = 'en';
        if (App::isLocale('en')) {
            $locale = 'ar';
        }
        $gallery = $customer->showedGallery;
        return view('customer.' . $customer->view_name, compact('customer', 'vcardImages', 'locale', 'gallery'));
    }

    public function eCardOff(Request $request)
    {
        return view('eCardOff');
    }

    public  function vcf(Request $request,  Customer $customer)
    {
        $fileName = 'contact_' . $customer->slug . '.vcf';
        $headers = [
            'Content-Type: text/x-vcard',
            'Content-Disposition: attachment; filename=' . $fileName
        ];

        $vCard = "BEGIN:VCARD\r\n";
        $vCard .= "VERSION:3.0\r\n";
        $vCard .= "FN;CHARSET=utf-8:" . Helper::removeSpecialCharacter($customer->name) . "\r\n";
        $vCard .= "TITLE;CHARSET=utf-8:" . Helper::removeSpecialCharacter($customer->about) . "\r\n";
        $vCard .= "TEL:" . $customer->mobile . "\r\n";
        $vCard .= "EMAIL:" . $customer->email . "\r\n";
        $vCard .= "URL:" . route("home") . "\r\n";
        $vCard .= "URL:" . route("customer", $customer->slug) . "\r\n";
        $vCard .= "END:VCARD\r\n";

        return response()->streamDownload(function () use ($vCard) {
            echo $vCard;
        }, $fileName, $headers);
    }

    public function contact(Request $request,  Customer $customer)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'mobile' => ['required', 'numeric'],
            'message' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $contact = new CustomerContactUs();
        $contact->name = $validatedData['name'];
        $contact->email =  $validatedData['email'] ?? '';
        $contact->mobile =  $validatedData['mobile'];
        $contact->message = $validatedData['message'];
        $contact->status = 1; //new
        $customer->contactUs()->save($contact);
        $contact->save();

        if (!is_null($customer->received_email)) {
            Mail::to($customer->received_email)->send(new ContactUsMail($contact));
        }
        session()->flash('success', trans('customer.sent_successfully'));
        return redirect()->back();
    }

    public function blogs(Request $request, Customer $customer)
    {
        $blogCategories = CustomerBlogCategory::where('showed', 1)->where('customer_id', $customer->id)->orderBy('position', 'asc')->get();
        $blogs = CustomerBlog::with(['category'])->where('showed', 1)->where('customer_id', $customer->id)->get();
        return view('customer.blogs', compact('blogs', 'blogCategories', 'customer'));
    }

    public function blog(Request $request, Customer $customer, CustomerBlog $customerBlog)
    {
        $relatedBlogs = CustomerBlog::with(['category'])
            ->where('showed', 1)
            ->where('customer_id', $customer->id)
            ->where('blog_category_id', $customerBlog->blog_category_id)
            ->where('id', '!=', $customerBlog->id)
            ->get();
        return view('customer.blog', compact('customerBlog', 'customer', 'relatedBlogs'));
    }
}
