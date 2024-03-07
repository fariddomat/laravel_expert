<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OrderService;

class OrderServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $orderServices = OrderService::with(['service'])->latest()->paginate(50);
        return view('dashboard.orderservices.index', compact('orderServices'));
    }

    public function destroy(OrderService $orderservice)
    {
        $orderservice->delete();
        session()->flash('success', 'Order Service Deleted Successfully');
        return redirect()->route('dashboard.orderservices.index');
    }

    public function changeStatus(Request $request, OrderService $orderservice)
    {
        $orderservice->status = 2; //done
        $orderservice->save();
        $response = [
            'status' => 1,
            'message' => 'Status Changed',
        ];
        return response()->json($response);
    }

    public function note(Request $request, OrderService $orderservice)
    {

        $orderservice->note = $request->note; //done
        $orderservice->save();
        session()->flash('success', 'Order Service Note Updated Successfully');
        return redirect()->back();
    }
}
