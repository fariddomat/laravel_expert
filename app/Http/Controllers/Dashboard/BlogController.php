<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator|blogger']);
    }

    public function index()
    {
        $blogs = Blog::with(['category'])->paginate(10);
        return view('dashboard.blogs.index', compact('blogs'));
    }
    public function create()
    {
        $categories = BlogCategory::all();
        return view('dashboard.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.title' => ['required'],
            'slug' => ['required', 'unique:blogs,slug'],
            'ar.description' => ['required'],
            'ar.introduction' => ['required'],
            'ar.content_table' => ['required'],
            'ar.first_paragraph' => ['required'],
            'category' => ['required', 'exists:blog_categories,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
            'show_at_home' => ['nullable'],
            'ar.author_name' => ['required'],
            'ar.author_title' => ['required'],
            'author_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'author_instagram' => ['nullable'],
            'author_snapchat' => ['nullable'],
            'author_twitter' => ['nullable'],
            'author_tiktok' => ['nullable'],
            'author_linkedin' => ['nullable'],

            // 'en.title' => ['required'],
            // 'en.description' => ['required'],
            // 'en.introduction' => ['required'],
            // 'en.content_table' => ['required'],
            // 'en.first_paragraph' => ['required'],
            // 'en.author_name' => ['required'],
            // 'en.author_title' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $blog = new Blog();
        $blog->translateOrNew('ar')->title = $validatedData['ar']['title'];
        $blog->translateOrNew('ar')->description = $validatedData['ar']['description'];
        $blog->translateOrNew('ar')->introduction = $validatedData['ar']['introduction'];
        $blog->translateOrNew('ar')->content_table = $validatedData['ar']['content_table'];
        $blog->translateOrNew('ar')->first_paragraph = $validatedData['ar']['first_paragraph'];
        $blog->blog_category_id = $validatedData['category'];
        $blog->translateOrNew('ar')->author_name = $validatedData['ar']['author_name'];
        $blog->translateOrNew('ar')->author_title = $validatedData['ar']['author_title'];

        // $blog->translateOrNew('en')->title = $validatedData['en']['title'];
        // $blog->translateOrNew('en')->description = $validatedData['en']['description'];
        // $blog->translateOrNew('en')->introduction = $validatedData['en']['introduction'];
        // $blog->translateOrNew('en')->content_table = $validatedData['en']['content_table'];
        // $blog->translateOrNew('en')->first_paragraph = $validatedData['en']['first_paragraph'];
        // $blog->translateOrNew('en')->author_name = $validatedData['en']['author_name'];
        // $blog->translateOrNew('en')->author_title = $validatedData['en']['author_title'];

        if ($request->has('author_image')) {
            $AuthorImage = $request->file('author_image');
            $filename = $AuthorImage->getClientOriginalName();
            $blog->author_image = $AuthorImage->storeAs('photos/blogs', $filename);
        }
        $blog->author_instagram  = $validatedData['author_instagram'] ?? null;
        $blog->author_snapchat  = $validatedData['author_snapchat'] ?? null;
        $blog->author_twitter  = $validatedData['author_twitter'] ?? null;
        $blog->author_tiktok  = $validatedData['author_tiktok'] ?? null;
        $blog->author_linkedin  = $validatedData['author_linkedin'] ?? null;
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $blog->image = $image->storeAs('photos/blogs', $filename);
        $blog->showed  = $request->has('showed') ? 1 : 0;
        $blog->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $blog->slug = Str::slug($validatedData['slug'], '-');
        $blog->save();
        session()->flash('success', 'Blog Added Successfully');
        return redirect()->route('dashboard.blogs.index');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        return view('dashboard.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {

        $rules = [
            'ar.title' => ['required'],
            'slug' => [
                'required',
                Rule::unique('blogs', 'slug')->ignore($blog->id)
            ],
            'ar.description' => ['required'],
            'ar.introduction' => ['required'],
            'ar.content_table' => ['required'],
            'ar.first_paragraph' => ['required'],
            'category' => ['required', 'exists:blog_categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
            'show_at_home' => ['nullable'],
            'ar.author_name' => ['required'],
            'ar.author_title' => ['required'],


            // 'en.title' => ['required'],
            // 'en.description' => ['required'],
            // 'en.introduction' => ['required'],
            // 'en.content_table' => ['required'],
            // 'en.first_paragraph' => ['required'],
            // 'en.author_name' => ['required'],
            // 'en.author_title' => ['required'],

            'author_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'author_instagram' => ['nullable'],
            'author_snapchat' => ['nullable'],
            'author_twitter' => ['nullable'],
            'author_tiktok' => ['nullable'],
            'author_linkedin' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);


        $blog->translate('ar')->title = $validatedData['ar']['title'];
        $blog->translate('ar')->description = $validatedData['ar']['description'];
        $blog->translate('ar')->introduction = $validatedData['ar']['introduction'];
        $blog->translate('ar')->content_table = $validatedData['ar']['content_table'];
        $blog->translate('ar')->first_paragraph = $validatedData['ar']['first_paragraph'];
        $blog->blog_category_id = $validatedData['category'];
        $blog->translate('ar')->author_name = $validatedData['ar']['author_name'];
        $blog->translate('ar')->author_title = $validatedData['ar']['author_title'];

        // $blog->translate('en')->title = $validatedData['en']['title'];
        // $blog->translate('en')->description = $validatedData['en']['description'];
        // $blog->translate('en')->introduction = $validatedData['en']['introduction'];
        // $blog->translate('en')->content_table = $validatedData['en']['content_table'];
        // $blog->translate('en')->first_paragraph = $validatedData['en']['first_paragraph'];
        // $blog->translate('en')->author_name = $validatedData['en']['author_name'];
        // $blog->translate('en')->author_title = $validatedData['en']['author_title'];

        if ($request->has('author_image')) {
            Storage::disk('local')->delete($blog->author_image);
            $AuthorImage = $request->file('author_image');
            $filename = $AuthorImage->getClientOriginalName();
            $blog->author_image = $AuthorImage->storeAs('photos/blogs', $filename);
        }
        $blog->author_instagram  = $validatedData['author_instagram'] ?? null;
        $blog->author_snapchat  = $validatedData['author_snapchat'] ?? null;
        $blog->author_twitter  = $validatedData['author_twitter'] ?? null;
        $blog->author_tiktok  = $validatedData['author_tiktok'] ?? null;
        $blog->author_linkedin  = $validatedData['author_linkedin'] ?? null;

        if ($request->has('image')) {
            // Storage::disk('local')->delete($blog->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $blog->image = $image->storeAs('photos/blogs', $filename);
        }
        $blog->showed  = $request->has('showed') ? 1 : 0;
        $blog->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $blog->slug = Str::slug($validatedData['slug'], '-');
        $blog->save();
        session()->flash('success', 'Blog Updated Successfully');
        return redirect()->route('dashboard.blogs.index');
    }
}
