<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $services = Service::orderBy('position')->get();
        return view('dashboard.services.index', compact('services'));
    }
    public function create()
    {
        $services = Service::all();

        return view('dashboard.services.create', compact('services'));
    }

    public function store(Request $request)
    {

        $rules = [
            'ar.title' => ['required'],
            'slug' => ['required', 'unique:services,slug'],
            'ar.intro' => ['nullable'],
            'ar.brief' => ['required'],
            'ar.main_title' => ['required'],

            // 'en.title' => ['required'],
            // 'en.brief' => ['required'],
            // 'en.main_title' => ['required'],

            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'index_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'index_image_mobile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'index_image_2' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],

            'showed' => ['nullable'],
            'show_at_home' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $service = new Service();


        $service->position = Service::max('position') + 1;

        $service->translateOrNew('ar')->title = $validatedData['ar']['title'];
        $service->translateOrNew('ar')->intro = $validatedData['ar']['intro'];
        $service->translateOrNew('ar')->brief = $validatedData['ar']['brief'];
        $service->translateOrNew('ar')->main_title = $validatedData['ar']['main_title'];

        // $service->translateOrNew('en')->title = $validatedData['en']['title'];
        // $service->translateOrNew('en')->brief = $validatedData['en']['brief'];
        // $service->translateOrNew('en')->main_title = $validatedData['en']['main_title'];

        $helper = new ImageHelper;
        $service->parent_id = $request->parent_id;
        if ($request->has('image')) {
            // $image = $request->file('image');
            // $filename = $image->getClientOriginalName();
            // $service->image = $image->storeAs('photos/services', $filename);

            $image = $request->file('image');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 235, 160);
            $service->image = $fullPath;
        }
        if ($request->has('index_image')) {
            $image = $request->file('index_image');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            $service->index_image = $fullPath;
        }

        if ($request->has('index_image_mobile')) {
            $image = $request->file('index_image_mobile');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
            $service->index_image_mobile = $fullPath;
        }
        if ($request->has('index_image_2')) {
            $image = $request->file('index_image_2');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            $service->index_image_2 = $fullPath;
        }
        $service->showed  = $request->has('showed') ? 1 : 0;
        $service->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $service->slug = Str::slug($validatedData['slug'], '-');
        $service->save();
        session()->flash('success', 'Service Added Successfully');
        return redirect()->route('dashboard.services.index');
    }

    public function edit(Service $service)
    {
        // dd(true);
        $services = Service::all();
        return view('dashboard.services.edit', compact('service', 'services'));
    }

    public function update(Request $request, Service $service)
    {
        $rules = [
            'ar.title' => ['required'],
            'slug' => [
                'required', 'unique:services,slug,' . $service->id
            ],
            'ar.intro' => ['nullable'],
            'ar.brief' => ['required'],
            'ar.main_title' => ['required'],

            // 'en.title' => ['required'],
            // 'en.brief' => ['required'],
            // 'en.main_title' => ['required'],

            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'index_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'index_image_mobile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
            'index_image_2' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],

            'showed' => ['nullable'],
            'show_at_home' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        $service->translate('ar')->title = $validatedData['ar']['title'];
        $service->translate('ar')->intro = $validatedData['ar']['intro'];
        $service->translate('ar')->brief = $validatedData['ar']['brief'];
        $service->translate('ar')->main_title = $validatedData['ar']['main_title'];

        // $service->translate('en')->title = $validatedData['en']['title'];
        // $service->translate('en')->brief = $validatedData['en']['brief'];
        // $service->translate('en')->main_title = $validatedData['en']['main_title'];

        $service->parent_id = $request->parent_id;

        $helper = new ImageHelper;
        if ($request->has('image')) {

            $helper->removeImageInPublicDirectory($service->image);
            $image = $request->file('image');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 265, 160);
            $service->image = $fullPath;
        }
        if ($request->has('index_image')) {

            $helper->removeImageInPublicDirectory($service->index_image);
            $image = $request->file('index_image');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            $service->index_image = $fullPath;
        }
        if ($request->has('index_image_mobile')) {
            $helper->removeImageInPublicDirectory($service->index_image_mobile);
            $image = $request->file('index_image_mobile');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
            $service->index_image_mobile = $fullPath;
        }
        if ($request->has('index_image_2')) {
            $helper->removeImageInPublicDirectory($service->index_image_2);
            $image = $request->file('index_image_2');
            $directory = '/photos/services';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory, 800, 500);
            $service->index_image_2 = $fullPath;
        }
        $service->showed  = $request->has('showed') ? 1 : 0;
        $service->show_at_home  = $request->has('show_at_home') ? 1 : 0;
        $service->slug = Str::slug($validatedData['slug'], '-');
        $service->save();
        session()->flash('success', 'Service Updated Successfully');
        return redirect()->route('dashboard.services.index');
    }

    public function destroyIndexImage(Service $service)
    {
        if ($service->index_image) {
            Storage::disk('local')->delete($service->index_image);
            $service->index_image = null;
            $service->save();
        }
    }


    public function destroyIndexImage2(Service $service)
    {
        if ($service->index_image_mobile) {
            Storage::disk('local')->delete($service->index_image_mobile);
            $service->index_image_mobile = null;
            $service->save();
        }
    }
    public function destroy(Service $service)
    {
        $service->delete();
        session()->flash('success', 'Service Deleted Successfully');
        return redirect()->route('dashboard.services.index');
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
        $movedService = Service::where('position', $from)->first();
        $toService = Service::where('position', $to)->first();
        // if ($movedService == null || $toService == null) {
        //     return response()->json(['status' => '0']);
        // }
        // dd($from);
        if ($from < $to) {
            $services = Service::whereBetween('position', [$from + 1, $to])->get();
            foreach ($services as $service) {
                $service->decrement('position');
            }
            $movedService->position = $to;
            $movedService->save();
        } else if ($from > $to) {
            $services = Service::whereBetween('position', [$to, $from - 1])->get();
            foreach ($services as $service) {
                $service->increment('position');
            }
            $movedService->position = $to;
            $movedService->save();
        }
        return response()->json(['status' => '1']);
    }
}
