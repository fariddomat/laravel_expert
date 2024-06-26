<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
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
        $blogs = Blog::with(['category'])->get();
        return view('dashboard.blogs.index', compact('blogs'));
    }
    public function create()
    {
        $categories = BlogCategory::all();
        $allTags = Tag::all();
        return view('dashboard.blogs.create', compact('categories', 'allTags'));
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
            $helper = new ImageHelper;
            $image = $request->file('author_image');
            $directory = '/photos/blogs';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 200, 200);
            $blog->author_image = $fullPath;
        }
        $blog->author_instagram  = $validatedData['author_instagram'] ?? null;
        $blog->author_snapchat  = $validatedData['author_snapchat'] ?? null;
        $blog->author_twitter  = $validatedData['author_twitter'] ?? null;
        $blog->author_tiktok  = $validatedData['author_tiktok'] ?? null;
        $blog->author_linkedin  = $validatedData['author_linkedin'] ?? null;

        $helper = new ImageHelper;
        $image = $request->file('image');
        $directory = '/photos/blogs';
        $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 550);
        $blog->image = $fullPath;


        if ($request->has('index_image')) {
            $image = $request->file('index_image');
            $directory = '/photos/blogs';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            $blog->index_image = $fullPath;
        }

        $blog->showed  = $request->has('showed') ? 1 : 0;
        $blog->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $blog->slug = Str::slug($validatedData['slug'], '-');
        $blog->save();

        $tagIds = [];

        if ($request->tags) {
            foreach ($request->tags as $tagId) {
                $tag = Tag::find($tagId);
                if (!$tag) {
                    $tag = Tag::create(['name' => $tagId]);  // Create a new tag
                }
                $tagIds[] = $tag->id;
            }
        }
        $blog->tags()->attach($tagIds);
        session()->flash('success', 'Blog Added Successfully');

        return redirect()->route('dashboard.blogs.index');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        $allTags = Tag::all();
        return view('dashboard.blogs.edit', compact('blog', 'categories', 'allTags'));
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
            $helper = new ImageHelper;
            $helper->removeImageInPublicDirectory($blog->author_image);
            $image = $request->file('author_image');
            $directory = '/photos/blogs';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 200, 200);
            $blog->author_image = $fullPath;
        }
        $blog->author_instagram  = $validatedData['author_instagram'] ?? null;
        $blog->author_snapchat  = $validatedData['author_snapchat'] ?? null;
        $blog->author_twitter  = $validatedData['author_twitter'] ?? null;
        $blog->author_tiktok  = $validatedData['author_tiktok'] ?? null;
        $blog->author_linkedin  = $validatedData['author_linkedin'] ?? null;

            $helper = new ImageHelper;
        if ($request->has('image')) {
            // Storage::disk('local')->delete($blog->image);

            $helper->removeImageInPublicDirectory($blog->image);
            $image = $request->file('image');
            $directory = '/photos/blogs';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            $blog->image = $fullPath;
        }
        if ($request->has('index_image')) {

            // $helper->removeImageInPublicDirectory($blog->index_image);
            $image = $request->file('index_image');
            $directory = '/photos/blogs';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            $blog->index_image = $fullPath;
        }
        $blog->showed  = $request->has('showed') ? 1 : 0;
        $blog->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $blog->slug = Str::slug($validatedData['slug'], '-');
        $blog->save();


        $tagIds = [];
        if ($request->tags) {
            foreach ($request->tags as $tagId) {
                $tag = Tag::find($tagId);
                if (!$tag) {
                    $tag = Tag::create(['name' => $tagId]);  // Create a new tag
                }
                $tagIds[] = $tag->id;
            }
        }
        $blog->tags()->sync($tagIds);
        session()->flash('success', 'Blog Updated Successfully');
        return redirect()->route('dashboard.blogs.index');
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', 'Blog Deleted Successfully');
        return redirect()->route('dashboard.blogs.index');
    }


    public function destroyIndexImage(Blog $blog)
    {
        if ($blog->index_image) {
            $helper = new ImageHelper;
            $helper->removeImageInPublicDirectory($blog->image);
        }
    }
}
