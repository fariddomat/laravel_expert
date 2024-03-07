<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkCategory;
use Illuminate\Support\Facades\Validator;

class WorkCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $workCategories = WorkCategory::orderBy('position', 'asc')->get();
        return view('dashboard.workcategories.index', compact('workCategories'));
    }

    public function create()
    {
        return view('dashboard.workcategories.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.name' => ['required'],
            'showed' => ['nullable'],
            // 'en.name' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $workCategory = new WorkCategory();
        // $workCategory->translateOrNew('en')->name = $validatedData['en']['name'];
        $workCategory->translateOrNew('ar')->name = $validatedData['ar']['name'];
        $workCategory->position = WorkCategory::max('position') + 1;
        $workCategory->showed  = $request->has('showed') ? 1 : 0;
        $workCategory->save();
        session()->flash('success', 'Work Category Added Successfully');
        return redirect()->route('dashboard.workcategories.index');
    }

    public function edit(WorkCategory $workcategory)
    {
        return view('dashboard.workcategories.edit', compact('workcategory'));
    }

    public function update(Request $request, WorkCategory $workcategory)
    {
        $rules = [
            'ar.name' => ['required'],
            // 'en.name' => ['required'],
            'showed' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        // $workcategory->translate('en')->name = $validatedData['en']['name'];
        $workcategory->translate('ar')->name = $validatedData['ar']['name'];
        $workcategory->showed  = $request->has('showed') ? 1 : 0;
        $workcategory->save();
        session()->flash('success', 'Work Category Updated Successfully');
        return redirect()->route('dashboard.workcategories.index');
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
        $movedCategory = WorkCategory::where('position', $from)->first();
        $toCategory = WorkCategory::where('position', $to)->first();
        if ($movedCategory == null || $toCategory == null) {
            return response()->json(['status' => '0']);
        }
        if ($from < $to) {
            $categories = WorkCategory::whereBetween('position', [$from + 1, $to])->get();
            foreach ($categories as $category) {
                $category->decrement('position');
            }
            $movedCategory->position = $to;
            $movedCategory->save();
        } else if ($from > $to) {
            $categories = WorkCategory::whereBetween('position', [$to, $from - 1])->get();
            foreach ($categories as $category) {
                $category->increment('position');
            }
            $movedCategory->position = $to;
            $movedCategory->save();
        }
        return response()->json(['status' => '1']);
    }
}
