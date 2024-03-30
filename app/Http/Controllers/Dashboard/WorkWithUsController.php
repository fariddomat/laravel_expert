<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\WorkWithUs;
use Illuminate\Http\Request;

class WorkWithUsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $workWithUss = WorkWithUs::latest()->paginate(50);
        return view('dashboard.workWithUs.index', compact('workWithUss'));
    }

    public function destroy(WorkWithUs $workWithUs)
    {
        $workWithUs->delete();
        session()->flash('success', 'Contact Us Deleted Successfully');
        return redirect()->route('dashboard.workWithUs.index');
    }
    public function changeStatus(Request $request, WorkWithUs $workWithUs)
    {
        $workWithUs->status = 2; //done
        $workWithUs->save();
        $response = [
            'status' => 1,
            'message' => 'Status Changed',
        ];
        return response()->json($response);
    }
}
