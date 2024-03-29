<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\VisitorInformation;
use App\Models\WorkWithUs;
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
