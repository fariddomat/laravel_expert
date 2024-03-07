<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Info;
use App\About;
use App\ContactInfo;
use App\Work;
use App\Blog;

class SitemapXmlController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $services = Service::where('showed', 1)->get();
        $info = Info::first();
        $about = About::first();
        $contact = ContactInfo::first();
        $works = Work::where('showed', 1)->get();
        $blogs = Blog::where('showed', 1)->get();
        $languages = ['en', 'ar'];

        return response()->view('sitemap', [
            'services' => $services,
            'info' => $info, 
            'about' => $about,
            'contact' => $contact,
            'works' => $works,
            'blogs' => $blogs,
            'languages' => $languages,
        ])->header('Content-Type', 'text/xml')
            ->header('charset', 'utf-8');
    }
}
