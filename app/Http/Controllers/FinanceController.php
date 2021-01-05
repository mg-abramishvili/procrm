<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Finance;
use App\Models\Document;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Finance::with('projects')->orderBy('date', 'desc')->paginate(200);

        $finances = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->get();

        $finances_collection_m = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->latest();
        $finances_collection_y = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->latest();

        $current_month = Carbon::now()->format('m');
        $current_year = Carbon::now()->format('Y');

        $finances_month = $finances_collection_m->whereMonth('date', $current_month)->get()->sum('amount');
        $finances_year = $finances_collection_y->whereYear('date', $current_year)->get()->sum('amount');

        return view('finances.index', compact('finances', 'current_month', 'current_year', 'finances_month', 'finances_year'));
        //dd($finances_month);
    }


    public function create()
    {
        $projects = Project::where('user_id', \Auth::user()->id)->latest()->get();
        return view('finances.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'projects' => 'required',
        ]);

        $data = request()->all();
        $finance = new Finance();
        $finance->title = $data['title'];
        $finance->amount = $data['amount'];
        $finance->date = $data['date'];
        $finance->save();
        $finance->projects()->attach($request->projects, ['finance_id' => $finance->id]);
        return redirect('/finances');
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
