<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\PackageCategory;
use App\Packagee;
use App\PackageService;
use App\Service;
use Illuminate\Http\Request;

class PackageServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($package_id)
    {

        $package=Packagee::findOrFail($package_id);
        $packageServices=$package->packageServices;
        return view('dashboard.packages.services.index', compact('package', 'packageServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package_id)
    {
        $package=Packagee::findOrFail($package_id);
        $package_categories=PackageCategory::all();
        return view('dashboard.packages.services.create', compact('package_categories', 'package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'packagee_id' => 'required',
            'package_category_id' => 'required',
            'name' => 'required',
            'value' => 'required',
        ]);
        PackageService::create($request->all());
        return redirect()->route('dashboard.packages.index');
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

        $service=PackageService::findOrFail($id);

        $package_categories=PackageCategory::all();
        return view('dashboard.packages.services.edit', compact('service', 'package_categories'));
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
        $request->validate([
            'package_category_id' => 'required',
            'name' => 'required',
            'value' => 'required',
        ]);
        $packageService=PackageService::findOrFail($id);
        $packageService->update($request->all());
        return redirect()->route('dashboard.packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $packageService=PackageService::findOrFail($id);
        $packageService->delete();
        return redirect()->route('dashboard.packages.index');
    }
}
