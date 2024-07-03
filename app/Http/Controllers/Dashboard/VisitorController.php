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
            COUNT(*) AS total_count,
            COUNT(DISTINCT CASE WHEN created_at >= ? THEN ip END) AS unique_today_count,
            COUNT(DISTINCT CASE WHEN created_at >= ? AND created_at <= ? THEN ip END) AS unique_last_week_count,
            COUNT(DISTINCT CASE WHEN MONTH(created_at) = MONTH(CURRENT_DATE()) THEN ip END) AS unique_last_month_count,
            COUNT(DISTINCT ip) AS unique_total_count
        ', [
                Carbon::today(),
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
                Carbon::today(),
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])
            ->groupBy('url')
            ->get();

        // Calculate the total counts for all URLs
        $totalCounts = VisitorInformation::selectRaw('
            SUM(CASE WHEN created_at >= ? THEN 1 ELSE 0 END) AS total_today_count,
            SUM(CASE WHEN created_at >= ? AND created_at <= ? THEN 1 ELSE 0 END) AS total_last_week_count,
            SUM(CASE WHEN MONTH(created_at) = MONTH(CURRENT_DATE()) THEN 1 ELSE 0 END) AS total_last_month_count,
            COUNT(*) AS total_total_count,
            COUNT(DISTINCT CASE WHEN created_at >= ? THEN ip END) AS unique_total_today_count,
            COUNT(DISTINCT CASE WHEN created_at >= ? AND created_at <= ? THEN ip END) AS unique_total_last_week_count,
            COUNT(DISTINCT CASE WHEN MONTH(created_at) = MONTH(CURRENT_DATE()) THEN ip END) AS unique_total_last_month_count,
            COUNT(DISTINCT ip) AS unique_total_total_count
        ', [
            Carbon::today(),
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
            Carbon::today(),
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])
            ->first();

        // Sum counts for blogs
        $blogsCounts = [
            'today_count' => 0,
            'unique_today_count' => 0,
            'last_week_count' => 0,
            'unique_last_week_count' => 0,
            'last_month_count' => 0,
            'unique_last_month_count' => 0,
            'total_count' => 0,
            'unique_total_count' => 0,
        ];

        foreach ($blogs as $blog) {
            $blogsCounts['today_count'] += views($blog)->period($day)->count();
            $blogsCounts['unique_today_count'] += views($blog)->period($day)->unique()->count();
            $blogsCounts['last_week_count'] += views($blog)->period($week)->count();
            $blogsCounts['unique_last_week_count'] += views($blog)->period($week)->unique()->count();
            $blogsCounts['last_month_count'] += views($blog)->period($month)->count();
            $blogsCounts['unique_last_month_count'] += views($blog)->period($month)->unique()->count();
            $blogsCounts['total_count'] += views($blog)->count();
            $blogsCounts['unique_total_count'] += views($blog)->unique()->count();
        }

        // Sum counts for services
        $servicesCounts = [
            'today_count' => 0,
            'unique_today_count' => 0,
            'last_week_count' => 0,
            'unique_last_week_count' => 0,
            'last_month_count' => 0,
            'unique_last_month_count' => 0,
            'total_count' => 0,
            'unique_total_count' => 0,
        ];

        foreach ($services as $service) {
            $servicesCounts['today_count'] += views($service)->period($day)->count();
            $servicesCounts['unique_today_count'] += views($service)->period($day)->unique()->count();
            $servicesCounts['last_week_count'] += views($service)->period($week)->count();
            $servicesCounts['unique_last_week_count'] += views($service)->period($week)->unique()->count();
            $servicesCounts['last_month_count'] += views($service)->period($month)->count();
            $servicesCounts['unique_last_month_count'] += views($service)->period($month)->unique()->count();
            $servicesCounts['total_count'] += views($service)->count();
            $servicesCounts['unique_total_count'] += views($service)->unique()->count();
        }

         // Data for the line chart
         $visitsLastThreeMonths = VisitorInformation::selectRaw('DATE(created_at) as date, COUNT(*) as count')
         ->where('created_at', '>=', Carbon::now()->subMonths(3))
         ->groupBy('date')
         ->orderBy('date')
         ->get();

             // Data for the line chart for blogs
    $blogVisitsLastThreeMonths = [];
    for ($date = Carbon::now()->subMonths(3); $date <= Carbon::now(); $date->addDay()) {
        $period = Period::create($date->startOfDay());
        $count = 0;
        foreach ($blogs as $blog) {
            $count += views($blog)->period($period)->count();
        }
        $blogVisitsLastThreeMonths[$date->format('Y-m-d')] = $count;
    }

    // Data for the line chart for services
    $serviceVisitsLastThreeMonths = [];
    for ($date = Carbon::now()->subMonths(3); $date <= Carbon::now(); $date->addDay()) {
        $period = Period::create($date->startOfDay());
        $count = 0;
        foreach ($services as $service) {
            $count += views($service)->period($period)->count();
        }
        $serviceVisitsLastThreeMonths[$date->format('Y-m-d')] = $count;
    }

    // dd($serviceVisitsLastThreeMonths);

        return view('dashboard.visitors.index', compact('day', 'week', 'month', 'blogs', 'services', 'urlCounts', 'totalCounts', 'blogsCounts', 'servicesCounts', 'visitsLastThreeMonths'));
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
