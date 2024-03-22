<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\OrderService;
use App\ContactUs;
use App\About;
use App\ContactInfo;
use App\AboutField;
use App\Client;
use App\Info;
use App\WorkCategory;
use App\Work;
use App\BlogCategory;
use App\Blog;
use Illuminate\Support\Facades\App;
use App\AboutImage;
use App\BlockedContact;
use App\DailyAppointment;
use App\DayOfWork;
use App\ExperinceSlider;
use App\Faq;
use App\GlobalSMS;
use App\SMS;
use App\Helpers\SMS as SMSHelper;
use App\HomeSlider;
use App\Packagee;
use App\PartnerSlider;
use App\Privacy;
use App\SMSLog;
use App\SocialMedia;
use App\Tag;
use App\Team;
use DateTime;
use Illuminate\Support\Carbon;
use Mail;

class SiteController extends Controller
{
    public function __construct()
    {
    }

    public function home()
    {
        $about = About::first();
        $info = Info::first();
        $aboutFields = AboutField::all();
        $workCategories = WorkCategory::where('showed', 1)->orderBy('position', 'asc')->get();
        $works = Work::with(['category'])->where('showed', 1)->where('show_at_home', 1)->get();
        $blogCategories = BlogCategory::where('showed', 1)->orderBy('position', 'asc')->get();
        $blogs = Blog::with(['category'])->where('showed', 1)->where('show_at_home', 1)->get();
        $clients = Client::all();
        $services = Service::where('showed', 1)->where('show_at_home', 1)->limit(3)->get();
        $contactInfo = ContactInfo::find(1);
        $allServices = Service::where('showed', 1)->get();
        $contactInfo = ContactInfo::find(1);
        $homeSlider = HomeSlider::all();
        $experinceSlider = ExperinceSlider::all();

        $packages = Packagee::all();
        return view('home', compact('info', 'about', 'aboutFields', 'workCategories', 'works', 'clients', 'blogs', 'blogCategories', 'services', 'contactInfo', 'allServices', 'contactInfo', 'homeSlider', 'experinceSlider', 'packages'));
    }

    public function about()
    {
        $info = Info::first();

        $about = About::first();
        $aboutImages = AboutImage::where('showed', 1)->orderBy('id')->get();
        // dd($aboutImages);
        $counter = range($aboutImages->count(), 1);
        $teams = Team::all();
        $partnerSlider = PartnerSlider::all();
        $experinceSlider = ExperinceSlider::all();

        return view('about', compact('about', 'aboutImages', 'counter', 'teams', 'partnerSlider', 'experinceSlider', 'info'));
    }

    public function privacy()
    {
        $privacy = Privacy::find(1);
        return view('privacy', compact('privacy',));
    }

    public function contact()
    {
        $info = Info::first();
        $services = Service::where('showed', 1)->get();
        $contactInfo = ContactInfo::find(1);
        return view('contact', compact('services', 'contactInfo', 'info'));
    }

    public function services()
    {
        $services = Service::where('showed', 1)->get();
        $info = Info::first();
        return view('services', compact('services', 'info'));
    }

    public function service(Request $request, Service $service)
    {
        views($service)
            ->record();
        $info = Info::first();

        switch ($service->id) {

            default:
                if (App::getLocale() == 'en') {
                    $arrow = 'right';
                } else { //ar
                    $arrow = 'left';
                }
                $questions = $service->questions->count();
                $halfOfQuestions = 0;
                if ($questions > 1) {
                    $halfOfQuestions = ceil($questions / 2);
                }
                $otherServices = Service::where('showed', 1)->get();
                return view('service', compact('service', 'halfOfQuestions', 'arrow', 'otherServices', 'info'));
        }
    }

    public function orderService(Request $request, Service $service)
    {
        return view('order_service', compact('service'));
    }

    public function storeOrderService(Request $request, Service $service)
    {

        // dd($service);

        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'mobile' => ['required', 'numeric'],
            'message' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);

        // honyBot validate
        if ($request->username) {
            session()->flash('success', trans('contact.sent_successfully'));
            return redirect()->back();
        }
        $blocked = '';
        if ($request->message == "") {
            $blocked = BlockedContact::where('name', $request->name)
                ->orWhere('email', $request->email);
        } else {
            $blocked = BlockedContact::where('name', $request->name)
                ->orWhere('email', $request->email)
                ->orWhere('message', $request->message);
        }
        if ($blocked->count() > 0) {
            session()->flash('success', trans('contact.sent_successfully'));
            return redirect()->back();
        }

        $orderService = new orderService();
        $orderService->name = $validatedData['name'];
        $orderService->email =  $validatedData['email'];
        $orderService->mobile =  $validatedData['mobile'];
        $orderService->message = $validatedData['message'] ?? null;
        $orderService->status = 1; //new
        $orderService->service_id = $service->id;
        $orderService->ip = $request->ip();
        $orderService->save();

        if ($service->id == 9) { //Larid ERP
            $sms = SMS::where('type', 'larid')->first();
        } else {
            $sms = SMS::where('type', 'service')->first();
        }
        $globalSms = GlobalSMS::first();
        if ($sms->status == 1 && $globalSms->status == 1) { // send sms
            if (SMSHelper::checkMobileNumber($validatedData['mobile'])) {
                $smsLog = SMSLog::where('send_to', $validatedData['mobile'])->where('created_at', '>', Carbon::now()->subHours(1)->toDateTimeString())->first();
                if (!$smsLog) {
                    $message = $sms->body;
                    $adminMessage = $sms->admin_message . ' , order id is ' . $orderService->id . ' , service is ' . $service->translate('en')->title . ' , customer info is ' . $validatedData['name'] . '-' . $validatedData['mobile'] . ' , order date is ' . $orderService->created_at;
                    if ($service->id == 9) { //Larid ERP
                        SMSHelper::sendLarid($validatedData['mobile'], $message);
                        SMSHelper::sendToAdminFromLarid($sms->admin_number, $adminMessage);
                    } else {
                        SMSHelper::sendService($validatedData['mobile'], $message);
                        SMSHelper::sendToAdminFromService($sms->admin_number, $adminMessage);
                    }
                }
            }
        }
        $info = array(
            'type' => 'order service',
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'data' => $request->message
        );
        Mail::send('mail', $info, function ($message) use ($orderService) {
            $message->to("info@project.com", "Mr. Abdulkader")
                ->subject('New order service');
            $message->from('card-ordrer@project.com', 'Digitsmark');
        });
        if ($service->slug == 'malak-screen' || $service->slug == 'organizing-exhibitions-and-conferences') {
            $info = array(
                'type' => 'order service',
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'data' => $request->message
            );
            Mail::send('mail', $info, function ($message) use ($orderService) {
                $message->to("info@project.com", "ADS")
                    ->subject('New order service');
                $message->from('card-ordrer@project.com', 'Digitsmark');
            });
        }
        session()->flash('success', trans('site.order_added_successfully'));
        return redirect()->route('services');
    }

    public function appointmentTime(Request $request)
    {


        try {
            $date = $request->appointment_date;
            $d    = new DateTime($date);
            $d->format('l');  //pass l for lion aphabet in format
            // dd($d->format('l'));
            $day = DayOfWork::where('day', $d->format('l'))->first();
            // dd($day);
            $time = DailyAppointment::where('day_of_work_id', $day->id)->get();

            return response()->json([
                'time' => $time
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'time' => null
            ]);
        }
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required',
            'appointment_time' => 'required',
        ]);
        $date = $request->appointment_date;
        $d    = new DateTime($date);
        $d->format('l');  //pass l for lion aphabet in format
        // dd($d->format('l'));
        $day = DayOfWork::where('day', $d->format('l'))->first();
        $time = DailyAppointment::findOrFail($request->appointment_time);
        $start_At = $request->appointment_date . ' ' . $time->time;
        session()->put('start_at', $start_At);
        $a = ContactUs::where('start_at', $start_At)->count();
        if ($a > 0) {
            return redirect()->back()->withErrors([
                'msg' => 'هذا الموعد محجوز مسبقاً'
            ]);
        }

        $rules = [
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'mobile' => ['required', 'numeric'],
            'services' => ['required', 'array'],
            'services.*' => ['numeric'],
            'message' => ['nullable'],
        ];
        $validatedData = $request->validate($rules);


        // honyBot validate
        if ($request->username) {
            session()->flash('success', trans('contact.sent_successfully'));
            return redirect()->back();
        }
        $blocked = '';
        if ($request->message == "") {
            $blocked = BlockedContact::where('name', $request->name)
                ->orWhere('email', $request->email);
        } else {
            $blocked = BlockedContact::where('name', $request->name)
                ->orWhere('email', $request->email)
                ->orWhere('message', $request->message);
        }
        if ($blocked->count() > 0) {
            session()->flash('success', trans('contact.sent_successfully'));
            return redirect()->back();
        }
        $contact = new ContactUs();
        $contact->name = $validatedData['name'];
        $contact->email =  $validatedData['email'] ?? '';
        $contact->mobile =  $validatedData['mobile'];
        $contact->message = $validatedData['message'] ?? '';
        $contact->status = 1; //new
        $contact->ip = $request->ip();
        $contact->save();
        if (isset($validatedData['services'])) {
            $contact->services()->attach($validatedData['services']);
        }
        $sms = SMS::where('type', 'contact')->first();

        $info = array(
            'type' => 'contact us',
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'data' => $request->message
        );
        Mail::send('mail', $info, function ($message) use ($contact) {
            $message->to("info@project.com", "info")
                ->subject('New Contact us');
            $message->from('card-ordrer@project.com', 'Almohtarif');
        });

        session()->flash('success', trans('contact.sent_successfully'));
        return redirect()->back();
    }

    public function work(Request $request,  Work $work)
    {
        return view('work', compact('work'));
    }

    public function blog(Request $request,  Blog $blog)
    {
        // dd($request->ip());
        $expiresAt = now()->addHours(3);
        // dd($expiresAt);
        views($blog)
            ->record();

        $relatedBlogs = Blog::with(['category'])
            ->where('showed', 1)
            ->where('blog_category_id', $blog->blog_category_id)
            ->where('id', '!=', $blog->id)
            ->limit(5)
            ->get();
        $socialMedias = SocialMedia::all();
        $categories = BlogCategory::all();
        $info = Info::first();
        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id')
            ->first();
        $previousBlog = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();
        $tags = Tag::all();
        return view('blog', compact('blog', 'relatedBlogs', 'socialMedias', 'categories', 'info', 'nextBlog', 'previousBlog', 'tags'));
    }

    public function blogs(Request $request)
    {
        $info = Info::first();
        $categories = BlogCategory::all();
        if ($request->tag) {
            $blogs = Tag::findOrFail($request->tag)->blogs;
            // dd($blogs);
        } elseif ($request->category) {
            $blogs = Blog::with(['category'])->whenCategory($request->category)->where('showed', 1)->latest()->get();
        } else {
            $blogs = Blog::with(['category'])->whenSearch($request->search)->where('showed', 1)->latest()->get();
        }

        // dd($blogs);
        $latestBlogs = Blog::latest()->limit(5);
        $search = $request->search;
        $tags = Tag::all();
        return view('blogs', compact('blogs', 'categories', 'info', 'latestBlogs', 'search', 'tags'));
    }

    public function profile()
    {
        $headers = array(
            'Content-Type: application/pdf',
        );
        if (App::getLocale() == 'en') {
            $file = public_path() . "/pdf/ Profile-En V06.pdf";
        } else {
            $file = public_path() . "/pdf/ Profile-Ar V06.pdf";
        }
        return response()->download($file, null, $headers);
    }

    public function faq()
    {
        $faqs = Faq::all();
        $info = Info::first();
        return view('faq', compact('faqs', 'info'));
    }
}
