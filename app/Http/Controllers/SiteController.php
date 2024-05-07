<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\OrderService;
use App\Models\ContactUs;
use App\Models\About;
use App\Models\ContactInfo;
use App\Models\AboutField;
use App\Models\Client;
use App\Models\Info;
use App\Models\WorkCategory;
use App\Models\Work;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Support\Facades\App;
use App\Models\AboutImage;
use App\Models\BlockedContact;
use App\Models\Counter;
use App\Models\DailyAppointment;
use App\Models\DayOfWork;
use App\Models\ExperinceSlider;
use App\Models\Faq;
use App\Models\GlobalSMS;
use App\Models\SMS;
use App\Helpers\SMS as SMSHelper;
use App\Models\HomeSlider;
use App\Models\Location;
use App\Models\Packagee;
use App\Models\PartnerSlider;
use App\Models\Privacy;
use App\Models\Review;
use App\Models\Role;
use App\Models\ServiceComment;
use App\Models\SMSLog;
use App\Models\SocialMedia;
use App\Models\Tag;
use App\Models\Team;
use App\Models\TeamRole;
use App\Models\User;
use App\Models\WorkWithUs;
use CyrildeWit\EloquentViewable\Support\Period;
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
        // auth()->user()->attachRole('hr');
        // Create Role
        // $hrRole = Role::create(['name' => 'hr']);

        // // Create User (assuming you have a User model)
        // $user = User::create([
        //     'name' => 'hr',
        //     'email' => 'hr@almohtarif-office.com',
        //     'password' => bcrypt('00@11@22$33'),
        // ]);

        // $user->attachRole('hr');
        // dd(auth()->user()->hasRole('hr'));
        // dd(auth()->user()->hasRole('hr'));
        $about = About::first();
        $info = Info::first();
        $aboutFields = AboutField::all();
        $workCategories = WorkCategory::where('showed', 1)->orderBy('position', 'asc')->get();
        $works = Work::with(['category'])->where('showed', 1)->where('show_at_home', 1)->get();
        $blogCategories = BlogCategory::where('showed', 1)->orderBy('position', 'asc')->get();
        $blogs = Blog::latest()->with(['category'])->where('showed', 1)->where('show_at_home', 1)->get();
        $clients = Client::all();
        $services = Service::where('showed', 1)->where('show_at_home', 1)->get();
        $contactInfo = ContactInfo::find(1);
        $allServices = Service::where('showed', 1)->orderBy('position')->get();
        $contactInfo = ContactInfo::find(1);
        $homeSlider = HomeSlider::all();
        $experinceSlider = ExperinceSlider::all();

        $packages = Packagee::all();
        $counters = Counter::all();
        $reviews = Review::latest()->get();
        $locations = Location::all();
        return view('home', compact('info', 'about', 'aboutFields', 'workCategories', 'works', 'clients', 'blogs', 'blogCategories', 'services', 'contactInfo', 'allServices', 'contactInfo', 'homeSlider', 'experinceSlider', 'packages', 'counters', 'reviews', 'locations'));
    }

    public function about()
    {
        $info = Info::first();

        $about = About::first();
        $aboutImages = AboutImage::where('showed', 1)->orderBy('id')->get();
        // dd($aboutImages);
        $counter = range($aboutImages->count(), 1);
        $teams = Team::orderBy('position')->get();
        $teamRoles = TeamRole::all();
        $partnerSlider = PartnerSlider::all();
        $experinceSlider = ExperinceSlider::all();

        return view('about', compact('about', 'aboutImages', 'counter', 'teams', 'partnerSlider', 'experinceSlider', 'info', 'teamRoles'));
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

    public function workWithUs()
    {
        $info = Info::first();
        $contactInfo = ContactInfo::find(1);
        return view('workWithUs', compact('contactInfo', 'info'));
    }

    public function postWorkWithUs(Request $request)
    {
        // 1. Validate the request data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:work_with_us',
            'mobile_number' => 'required|numeric',
            'address' => 'required|string',
            'marital_status' => 'required|in:single,married,other',
            'study_major' => 'required|string',
            'current_job' => 'nullable|string',
            'other_work_experiences' => 'nullable|string',
            'english_level' => 'required|in:beginner,intermediate,good,very_good',
            'skills' => 'required|array', // Assuming skills are an array
            'additional_information' => 'nullable|string',
            'job_benefit_goals' => 'required|string',
        ]);

        // 2. Create a new WorkWithUs instance
        $workWithUs = new WorkWithUs();

        // 3. Assign validated data to the model
        $workWithUs->full_name = $validatedData['full_name'];
        $workWithUs->gender = $validatedData['gender'];
        $workWithUs->date_of_birth = $validatedData['date_of_birth'];
        $workWithUs->email = $validatedData['email'];
        $workWithUs->mobile_number = $validatedData['mobile_number'];
        $workWithUs->address = $validatedData['address'];
        $workWithUs->marital_status = $validatedData['marital_status'];
        $workWithUs->study_major = $validatedData['study_major'];
        $workWithUs->current_job = $validatedData['current_job'];
        $workWithUs->other_work_experiences = $validatedData['other_work_experiences'];
        $workWithUs->english_level = $validatedData['english_level'];
        $workWithUs->skills = json_encode($validatedData['skills']); // Store skills as JSON
        $workWithUs->additional_information = $validatedData['additional_information'];
        $workWithUs->job_benefit_goals = $validatedData['job_benefit_goals'];

        // 4. Save the model to the database
        $workWithUs->save();

        session()->flash('success', trans('contact.sent_successfully'));
        // 5. Redirect or show success message
        return redirect()->route('home')->with('message', 'تم إرسال الطلب بنجاح!');
    }

    public function services()
    {
        $services = Service::where('showed', 1)->orderBy('position')->get();
        $info = Info::first();
        return view('services', compact('services', 'info'));
    }

    public function service(Request $request, Service $service)
    {
        // dd($service->parent_id);
        views($service)
            ->record();

        // dd(views($service)->unique()->count());

        $info = Info::first();
        $categories = BlogCategory::all();
        $latestBlogs = Blog::where('showed', 1)->where('show_at_home', 1)->latest()->limit(5)->get();
        $search = $request->search;
        $tags = Tag::all();
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
                return view('service', compact('service', 'halfOfQuestions', 'arrow', 'otherServices', 'info', 'categories', 'latestBlogs', 'search', 'tags'));
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

        $info = array(
            'type' => 'order service',
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'data' => $request->message
        );
        Mail::send('mail', $info, function ($message) use ($orderService) {
            $message->to("info@project.com", "Al-Mohtarif")
                ->subject('New order service');
            $message->from('card-ordrer@project.com', 'Al-Mohtarif');
        });
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
            'mobile' => ['nullable'],

            'phone' => ['nullable'],
            'contact_method' => ['required'],
            // 'dob' => ['required'],
            'city' => ['nullable'],
            'cert_degree' => ['required'],

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

        $dob= $request->day."/".$request->month."/".$request->year;
        // dd($dob);
        $contact = new ContactUs();
        $contact->name = $validatedData['name'];
        $contact->email =  $validatedData['email'] ?? '';
        $contact->mobile =  $validatedData['mobile'] ?? '';

        $contact->phone =  $validatedData['phone'] ?? '';
        $contact->contact_method =  $validatedData['contact_method'];
        $contact->dob =  $dob;
        $contact->city =  $validatedData['city'] ?? '';
        $contact->cert_degree =  $validatedData['cert_degree'];
        $contact->start_at =  $start_At;

        $contact->message = $validatedData['message'] ?? '';
        $contact->status = 1; //new
        $contact->ip = $request->ip();
        $contact->save();
        if (isset($validatedData['services'])) {
            $contact->services()->attach($validatedData['services']);
        }
        $sms = SMS::where('type', 'contact')->first();

        $info = array(
            'name' => $request->name,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
            'email' => $request->email,
            'contact_method' => $request->contact_method,
            'dob' => $dob,
            'city' => $request->city,
            'cert_degree' => $request->cert_degree,
            'start_at' => $start_At,

            'data' => $contact->services
        );
        try {
            //code...
            Mail::send('mail', $info, function ($message) use ($contact) {
                $message->to("almohtarif.contact.form@gmail.com", "Almohtarif")
                    ->subject('طلب استشارة مجانية جديد');
                $message->from('support@almohtarif-office.com', 'Almohtarif');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }

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
        if ($request->tag) {
            $blogs = Tag::findOrFail($request->tag)->blogs;
        } elseif ($request->category) {
            $blogs = Blog::with(['category'])->whenCategory($request->category)->where('showed', 1)->latest()->get();
        } elseif ($request->author) {
            $blogs = Blog::with(['category'])->whenAuthor($request->author)->where('showed', 1)->latest()->get();
        } else {
            $blogs = Blog::with(['category'])->whenSearch($request->search)->where('showed', 1)->latest()->get();
        }

        $categories = BlogCategory::all();
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

    public function postComment(Request $request){
        $request->validate([
            'service_id'=> 'required',
            'name'=> 'required',
            'email'=> 'required|email',
            'name'=> 'required',
        ]);
        $comment=ServiceComment::create($request->all());

        $info = array(
            'name' => $request->name,
            'email' => $request->email,
            'service' => $comment->service->title,
            'comment' => $request->content,
        );
        try {
            //code...
            Mail::send('mail', $info, function ($message)  {
                $message->to("almohtarif.contact.form@gmail.com", "Almohtarif")
                    ->subject('تم إضافة تعليق جديد');
                $message->from('support@almohtarif-office.com', 'Almohtarif');
            });
        } catch (\Throwable $th) {
            // throw $th;
        }

        session()->flash('success', trans('تم إضافة التعليق بنجاح'));
        return redirect()->back();
    }

}
