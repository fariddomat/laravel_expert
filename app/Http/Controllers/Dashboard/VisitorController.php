<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\VisitorInformation;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $day = Period::subHours(24);
        $week = Period::pastDays(7);
        $month = Period::pastMonths(1);
        $blogs = Blog::all();
        $services = Service::all();


        $urlCounts = VisitorInformation::select('url')
            ->selectRaw('
                SUM(CASE WHEN created_at >= ? THEN 1 ELSE 0 END) AS today_count,
                SUM(CASE WHEN created_at >= ? AND created_at <= ? THEN 1 ELSE 0 END) AS last_week_count,
                SUM(CASE WHEN MONTH(created_at) = MONTH(CURRENT_DATE()) THEN 1 ELSE 0 END) AS last_month_count,
                COUNT(*) AS total_count
            ', [
                            Carbon::today(),
                            Carbon::now()->startOfWeek(),
                            Carbon::now()->endOfWeek(),
                        ])
            ->groupBy('url')
            ->get();
        return view('dashboard.visitors.index', compact('day', 'week', 'month', 'blogs', 'services' ,'urlCounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
