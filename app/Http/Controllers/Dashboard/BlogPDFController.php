<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\BlogPdf;

class BlogPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function create()
    {
        $blogPdf = BlogPdf::find(1);
        return view('dashboard.blogs.blogpdf', compact('blogPdf'));
    }
    public function store(Request $request)
    {
        $rules = [
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        $blogPdf = blogPdf::find(1);
        if (is_null($blogPdf)) {
            $blogPdf = new blogPdf();
        }

        if ($request->has('image')) {
            Storage::disk('local')->delete($blogPdf->header_image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $blogPdf->header_image = $image->storeAs('photos/blogPDF', $filename);
        }
        $blogPdf->save();
        session()->flash('success', 'Blog PDF Updated Successfully');
        return redirect()->route('dashboard.blogPDF.create');
    }
}
