<?php

namespace App\Http\Controllers\Dashboard;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $faqs = Faq::all(); // Fetch all FAQs

        return view('dashboard.faqs.index', compact('faqs')); // Pass data to view

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.faqs.create'); // Display create form view

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
            'question' => 'required|string', // Validation rules for question
            'answer' => 'required|string', // Validation rules for answer
        ]);

        Faq::create($request->all()); // Create a new Faq model

        return redirect()->route('dashboard.faqs.index') // Redirect after creation
            ->with('success', 'FAQ created successfully!');
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
        $faq = Faq::find($id);

        if (!$faq) {
            return abort(404); // Handle non-existent FAQ
        }

        return view('dashboard.faqs.edit', compact('faq')); // Display edit form view

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
            'question' => 'required|string', // Validation rules for question
            'answer' => 'required|string', // Validation rules for answer
        ]);

        $faq = Faq::find($id);

        if (!$faq) {
            return abort(404); // Handle non-existent FAQ
        }

        $faq->update($request->all()); // Update the FAQ

        return redirect()->route('dashboard.faqs.index') // Redirect after update
            ->with('success', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $faq = Faq::find($id);

        if (!$faq) {
            return abort(404); // Handle non-existent FAQ
        }

        $faq->delete(); // Delete the FAQ

        return redirect()->route('dashboard.faqs.index') // Redirect after deletion
            ->with('success', 'FAQ deleted successfully!');
    }
}
