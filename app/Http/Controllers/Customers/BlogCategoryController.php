<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerBlogCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:client']);
    }

    public function index()
    {
        $this->authorize('create', CustomerBlogCategory::class);
        $customer = Auth::user()->customer;
        $blogCategories = CustomerBlogCategory::where('customer_id', $customer->id)->orderBy('position', 'asc')->get();
        return view('customers.blogcategories.index', compact('blogCategories'));
    }

    public function create()
    {
        $this->authorize('create', CustomerBlogCategory::class);
        return view('customers.blogcategories.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', CustomerBlogCategory::class);

        $rules = [
            'ar.name' => ['required'],
            'en.name' => ['required'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);
        $customer = Auth::user()->customer;

        $blogCategory = new CustomerBlogCategory();
        $blogCategory->translateOrNew('en')->name = $validatedData['en']['name'];
        $blogCategory->translateOrNew('ar')->name = $validatedData['ar']['name'];
        $blogCategory->position = CustomerBlogCategory::where('customer_id', $customer->id)->max('position') + 1;
        $blogCategory->showed  = $request->has('showed') ? 1 : 0;
        $blogCategory->customer_id = $customer->id;
        $blogCategory->save();
        session()->flash('success', 'Blog Category Added Successfully');
        return redirect()->route('customers.dashboard.blogcategories.index');
    }
    public function edit(CustomerBlogCategory $blogcategory)
    {
        $this->authorize('update', $blogcategory);
        return view('customers.blogcategories.edit', compact('blogcategory'));
    }

    public function update(Request $request, CustomerBlogCategory $blogcategory)
    {
        $this->authorize('update', $blogcategory);
        $rules = [
            'ar.name' => ['required'],
            'en.name' => ['required'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $blogcategory->translate('en')->name = $validatedData['en']['name'];
        $blogcategory->translate('ar')->name = $validatedData['ar']['name'];
        $blogcategory->showed  = $request->has('showed') ? 1 : 0;
        $blogcategory->save();
        session()->flash('success', 'Blog Category Updated Successfully');
        return redirect()->route('customers.dashboard.blogcategories.index');
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
        $customer = Auth::user()->customer;
        $from = $request->from;
        $to = $request->to;
        $movedCategory = CustomerBlogCategory::where('customer_id', $customer->id)->where('position', $from)->first();
        $toCategory = CustomerBlogCategory::where('customer_id', $customer->id)->where('position', $to)->first();
        if ($movedCategory == null || $toCategory == null) {
            return response()->json(['status' => '0']);
        }
        if ($from < $to) {
            $categories = CustomerBlogCategory::where('customer_id', $customer->id)->whereBetween('position', [$from + 1, $to])->get();
            foreach ($categories as $category) {
                $category->decrement('position');
            }
            $movedCategory->position = $to;
            $movedCategory->save();
        } else if ($from > $to) {
            $categories = CustomerBlogCategory::where('customer_id', $customer->id)->whereBetween('position', [$to, $from - 1])->get();
            foreach ($categories as $category) {
                $category->increment('position');
            }
            $movedCategory->position = $to;
            $movedCategory->save();
        }
        return response()->json(['status' => '1']);
    }
}
