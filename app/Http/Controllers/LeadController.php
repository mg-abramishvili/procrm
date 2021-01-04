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
        return Lead::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
    }

    public function add(Request $request)
    {
        $lead = new Lead([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'user_id' => \Auth::user()->id,
        ]);
        $lead->save();
        return response()->json('The lead successfully added');
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
