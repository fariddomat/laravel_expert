<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Work;
use App\WorkCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $works = Work::with(['category'])->paginate(10);
        return view('dashboard.works.index', compact('works'));
    }
    public function create()
    {
        $categories = WorkCategory::all();
        return view('dashboard.works.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.title' => ['required'],
            'slug' => ['required', 'unique:works,slug'],
            'ar.description' => ['required'],

            // 'en.title' => ['required'],
            // 'en.description' => ['required'],

            'category' => ['required', 'exists:work_categories,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
            'show_at_home' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $work = new Work();
        // $work->translateOrNew('en')->title = $validatedData['en']['title'];
        // $work->translateOrNew('ar')->description = $validatedData['ar']['description'];

        $work->translateOrNew('ar')->title = $validatedData['ar']['title'];
        $work->translateOrNew('en')->description = $validatedData['en']['description'];
        $work->work_category_id = $validatedData['category'];
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $work->image = $image->storeAs('photos/works', $filename);
        $work->showed  = $request->has('showed') ? 1 : 0;
        $work->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $work->slug = Str::slug($validatedData['slug'], '-');
        $work->save();
        session()->flash('success', 'Work Added Successfully');
        return redirect()->route('dashboard.works.index');
    }
    public function edit(Work $work)
    {
        $categories = WorkCategory::all();
        return view('dashboard.works.edit', compact('work', 'categories'));
    }

    public function update(Request $request, Work $work)
    {
        $rules = [
            'ar.title' => ['required'],
            'slug' => [
                'required',
                Rule::unique('works', 'slug')->ignore($work->id)
            ],
            'ar.description' => ['required'],

            // 'en.title' => ['required'],
            // 'en.description' => ['required'],

            'category' => ['required', 'exists:work_categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'showed' => ['nullable'],
            'show_at_home' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        // $work->translate('en')->title = $validatedData['en']['title'];
        // $work->translate('en')->description = $validatedData['en']['description'];

        $work->translate('ar')->title = $validatedData['ar']['title'];
        $work->translate('ar')->description = $validatedData['ar']['description'];
        $work->work_category_id = $validatedData['category'];
        if ($request->has('image')) {
            Storage::disk('local')->delete($work->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $work->image = $image->storeAs('photos/works', $filename);
        }
        $work->showed  = $request->has('showed') ? 1 : 0;
        $work->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $work->slug = Str::slug($validatedData['slug'], '-');
        $work->save();
        session()->flash('success', 'Work Updated Successfully');
        return redirect()->route('dashboard.works.index');
    }
}
