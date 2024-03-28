<?php

namespace App\Http\Controllers\Dashboard;

use App\Blog;
use App\BlogCategory;
use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Service;
use App\VisitorInformation;
use App\WorkWithUs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator|blogger']);
    }

    public function home()
    {
        $blogs=Blog::count();
        $blogCategories=BlogCategory::count();
        $services=Service::count();
        $contact_us=ContactUs::count();
        $workWithUs=WorkWithUs::count();
        $visitors=VisitorInformation::count();

        return view('dashboard.home', compact('blogs', 'blogCategories', 'services', 'contact_us', 'workWithUs', 'visitors'));
    }
}
