<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator|blogger']);
    }

    public function index()
    {
        $blogCategories = BlogCategory::orderBy('position', 'asc')->get();
        return view('dashboard.blogcategories.index', compact('blogCategories'));
    }

    public function create()
    {
        return view('dashboard.blogcategories.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.name' => ['required'],
            'showed' => ['nullable'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],

            // 'en.name' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $blogCategory = new BlogCategory();
        $blogCategory->translateOrNew('ar')->name = $validatedData['ar']['name'];

        // $blogCategory->translateOrNew('en')->name = $validatedData['en']['name'];

        $blogCategory->position = BlogCategory::max('position') + 1;
        $blogCategory->showed  = $request->has('showed') ? 1 : 0;

        $image = $request->file('image');
        $directory = '/photos/blogCategories'; // Replace with the desired directory
        // dd($directory);
        $helper = new ImageHelper;
        $fullPath = $helper->storeImageInPublicDirectory($image, $directory,100,100);
        // Save the full path with name in the database
        $blogCategory->image = $fullPath;

        $blogCategory->save();
        session()->flash('success', 'Blog Category Added Successfully');
        return redirect()->route('dashboard.blogcategories.index');
    }
    public function edit(BlogCategory $blogcategory)
    {
        return view('dashboard.blogcategories.edit', compact('blogcategory'));
    }

    public function update(Request $request, BlogCategory $blogcategory)
    {
        $rules = [
            'ar.name' => ['required'],
            'showed' => ['nullable'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            //'en.name' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        // $blogcategory->translate('en')->name = $validatedData['en']['name'];
        $blogcategory->translate('ar')->name = $validatedData['ar']['name'];
        $blogcategory->showed  = $request->has('showed') ? 1 : 0;
        if ($request->has('image')) {
            $helper = new ImageHelper;
            $helper->removeImageInPublicDirectory($blogcategory->image);
            $image = $request->file('image');
            $directory = '/photos/blogCategories';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 100, 100);
            $blogcategory->image = $fullPath;
        }
        $blogcategory->save();
        session()->flash('success', 'Blog Category Updated Successfully');
        return redirect()->route('dashboard.blogcategories.index');
    }

    public function reorder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|integer',
            'to' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => '0']);
        }
        $from = $request->from;
        $to = $request->to;
        $movedCategory = BlogCategory::where('position', $from)->first();
        $toCategory = BlogCategory::where('position', $to)->first();
        if ($movedCategory == null || $toCategory == null) {
            return response()->json(['status' => '0']);
        }
        if ($from < $to) {
            $categories = BlogCategory::whereBetween('position', [$from + 1, $to])->get();
            foreach ($categories as $category) {
                $category->decrement('position');
            }
            $movedCategory->position = $to;
            $movedCategory->save();
        } else if ($from > $to) {
            $categories = BlogCategory::whereBetween('position', [$to, $from - 1])->get();
            foreach ($categories as $category) {
                $category->increment('position');
            }
            $movedCategory->position = $to;
            $movedCategory->save();
        }
        return response()->json(['status' => '1']);
    }
}
