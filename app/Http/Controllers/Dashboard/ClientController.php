<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $clients = Client::all();
        return view('dashboard.clients.index', compact('clients'));
    }
    public function create()
    {
        return view('dashboard.clients.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'ar.name' => ['required'],
            'en.name' => ['required'],
            'ar.company' => ['required'],
            'en.company' => ['required'],
            'ar.position' => ['required'],
            'en.position' => ['required'],
            'ar.talk' => ['required'],
            'en.talk' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        $client = new Client();
        $client->translateOrNew('en')->name = $validatedData['en']['name'];
        $client->translateOrNew('ar')->name = $validatedData['ar']['name'];
        $client->translateOrNew('en')->company = $validatedData['en']['company'];
        $client->translateOrNew('ar')->company = $validatedData['ar']['company'];
        $client->translateOrNew('en')->position = $validatedData['en']['position'];
        $client->translateOrNew('ar')->position = $validatedData['ar']['position'];
        $client->translateOrNew('en')->talk = $validatedData['en']['talk'];
        $client->translateOrNew('ar')->talk = $validatedData['ar']['talk'];
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $client->image = $image->storeAs('photos/clients', $filename);
        $client->save();
        session()->flash('success', 'Client Added Successfully');
        return redirect()->route('dashboard.clients.index');
    }

    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $rules = [
            'ar.name' => ['required'],
            'en.name' => ['required'],
            'ar.company' => ['required'],
            'en.company' => ['required'],
            'ar.position' => ['required'],
            'en.position' => ['required'],
            'ar.talk' => ['required'],
            'en.talk' => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp'],
        ];
        $validatedData = $request->validate($rules);

        $client->translate('en')->name = $validatedData['en']['name'];
        $client->translate('ar')->name = $validatedData['ar']['name'];
        $client->translate('en')->company = $validatedData['en']['company'];
        $client->translate('ar')->company = $validatedData['ar']['company'];
        $client->translate('en')->position = $validatedData['en']['position'];
        $client->translate('ar')->position = $validatedData['ar']['position'];
        $client->translate('en')->talk = $validatedData['en']['talk'];
        $client->translate('ar')->talk = $validatedData['ar']['talk'];
        if ($request->has('image')) {
            Storage::disk('local')->delete($client->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $client->image = $image->storeAs('photos/clients', $filename);
        }
        $client->save();
        session()->flash('success', 'Client Updated Successfully');
        return redirect()->route('dashboard.clients.index');
    }
}
