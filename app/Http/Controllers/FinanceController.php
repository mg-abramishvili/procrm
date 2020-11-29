<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Finance;
use App\Models\Document;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Finance::with('projects')->orderBy('date', 'desc')->paginate(20);
    }

    public function add(Request $request)
    {
        $finance = new Finance([
            'title' => $request->get('title'),
            'amount' => $request->get('amount'),
            'date' => $request->get('date'),
        ]);
        $finance->save();
        $finance->projects()->attach($request->projects, ['finance_id' => $finance->id]);
        return response()->json('The finance successfully added');
    }

    public function edit($id)
    {
        $finance = Finance::find($id);
        return response()->json($finance);
    }

    public function update($id, Request $request)
    {
        $finance = Finance::find($id);
        $finance->update($request->all());

        return response()->json('The finance successfully updated');
    }

    public function view($id)
    {
        $finance = Finance::find($id);
        return response()->json($finance);
    }

    public function delete($id)
    {
        $finance = Finance::find($id);
        $finance->delete();

        return response()->json('The finance successfully deleted');
    }
}
