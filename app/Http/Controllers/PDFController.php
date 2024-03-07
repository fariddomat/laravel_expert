<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use PDF;
use App\BlogPdf;
use App\SocialMedia;
use App\CustomerBlog;

class PDFController extends Controller
{
    public function __construct()
    {
    }

    public function downloadBlog(Request $request, Blog $blog)
    {
        $blogPdf = BlogPdf::find(1);
        $socialMedias = SocialMedia::all();
        $data = ['blog' => $blog, 'blogPdf' => $blogPdf, 'socialMedias' => $socialMedias];
        $pdf = PDF::loadView('pdf.blog', $data);
        return $pdf->download($blog->title . '.pdf');
    }

    public function downloadCustomerBlog(Request $request, CustomerBlog $blog)
    {
        $data = ['blog' => $blog];
        $pdf = PDF::loadView('pdf.customerBlog', $data);
        return $pdf->download($blog->title . '.pdf');
    }
}
