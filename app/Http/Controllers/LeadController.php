<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);

        $data = request()->all();
        $lead = new Lead();
        $lead->title = $data['title'];
        $lead->text = $data['text'];
        $lead->user_id = \Auth::user()->id;
        $lead->save();
        return redirect('/leads');
    }

    public function edit($id)
    {
        $lead = Lead::find($id);
        return response()->json($lead);
    }

    public function update($id, Request $request)
    {
        $lead = Lead::find($id);
        $lead->update($request->all());

        return response()->json('The lead successfully updated');
    }

    public function view($id)
    {
        $lead = Lead::find($id);
        return response()->json($lead);
    }

    public function delete($id)
    {
        $lead = Lead::find($id);
        $lead->delete();

        return response()->json('The lead successfully deleted');
    }
}
