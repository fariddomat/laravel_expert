<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceQuestion;

class ServiceQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index(Request $request, Service $service)
    {
        $questions = $service->questions()->get();
        return view('dashboard.services.questions.index', compact('questions', 'service'));
    }

    public function create(Request $request, Service $service)
    {
        return view('dashboard.services.questions.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $rules = [
            'ar.question' => ['required'],
            'ar.answer' => ['required'],
            // 'en.question' => ['required'],
            // 'en.answer' => ['required'],
        ];
        $validatedData = $request->validate($rules);
        $question  = new ServiceQuestion();
        $question->translateOrNew('ar')->question = $validatedData['ar']['question'];
        $question->translateOrNew('ar')->answer = $validatedData['ar']['answer'];
        // $question->translateOrNew('en')->question = $validatedData['en']['question'];
        // $question->translateOrNew('en')->answer = $validatedData['en']['answer'];
        $question->service_id = $service->id;
        $question->save();
        session()->flash('success', 'Question Added Successfully');
        return redirect()->route('dashboard.services.questions.index', $service->id);
    }

    public function edit(ServiceQuestion $question)
    {
        return view('dashboard.services.questions.edit', compact('question'));
    }

    public function update(Request $request, ServiceQuestion $question)
    {
        $rules = [
            'ar.question' => ['required'],
            'ar.answer' => ['required'],
            // 'en.question' => ['required'],
            // 'en.answer' => ['required'],
        ];
        $validatedData = $request->validate($rules);
        $question->translateOrNew('ar')->question = $validatedData['ar']['question'];
        $question->translateOrNew('ar')->answer = $validatedData['ar']['answer'];
        // $question->translateOrNew('en')->question = $validatedData['en']['question'];
        // $question->translateOrNew('en')->answer = $validatedData['en']['answer'];
        $question->save();
        session()->flash('success', 'Question Updated Successfully');
        return redirect()->route('dashboard.services.questions.index', $question->service_id);
    }

    public function destroy(ServiceQuestion $question)
    {
        $question->deleteTranslations(['ar', 'en']);
        $question->delete();
        session()->flash('success', 'Question Deleted Successfully');
        return redirect()->back();
    }
}
