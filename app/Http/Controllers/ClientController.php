<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::where('user_id', \Auth::user()->id)->latest()->get();
        
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = request()->all();
        $client = new Client();
        $client->name = $data['name'];
        $client->user_id = \Auth::user()->id;
        $client->save();
        return redirect('/clients');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = request()->all();
        $client = Client::find($data['id']);
        $client->name = $data['name'];
        $client->save();
        return redirect('/clients');
    }

    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));
    }

    public function delete($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect('/clients');
    }
}
