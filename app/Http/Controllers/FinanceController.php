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
        $finances = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->orderBy('date', 'desc')->get()->groupBy(function($d) {
            return Carbon::parse($d->date)->format('Y-m');
        });

        // CURRENT MONTH COLLECTION
        $finances_collection_m = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->latest();
        // PAST MONTH COLLECTION (-1)
        $finances_collection_m_past = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->latest();
        // CURRENT YEAR COLLECTION
        $finances_collection_y = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->latest();
        // PAST YEAR COLLECTION (-1)
        $finances_collection_y_past = Finance::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->latest();



        // CURRENT MONTH
        $current_month = Carbon::now()->format('m');
        // PAST MONTH (-1)
        $past_month = Carbon::now()->subMonth(1)->format('m');
        // CURRENT YEAR
        $current_year = Carbon::now()->format('Y');
        // PAST YEAR (-1)
        $past_year = Carbon::now()->subYear(1)->format('Y');



        // SUMS OF CURRENT MONTH
        $finances_month = $finances_collection_m->whereYear('date', $current_year)->whereMonth('date', $current_month)->where('fin_type', 'plus')->get()->sum('amount');
        
        // SUMS OF PAST MONTH
        if ($current_month == '01') {
            $finances_month_past = $finances_collection_m_past->whereYear('date', $past_year)->whereMonth('date', $past_month)->where('fin_type', 'plus')->get()->sum('amount');
        } else {
            $finances_month_past = $finances_collection_m_past->whereYear('date', $current_year)->whereMonth('date', $past_month)->where('fin_type', 'plus')->get()->sum('amount');
        }

        // SUMS OF CURRENT YEAR
        $finances_year = $finances_collection_y->whereYear('date', $current_year)->where('fin_type', 'plus')->get()->sum('amount');
        
        // SUMS OF PAST YEAR (-1)
        $finances_year_past = $finances_collection_y_past->whereYear('date', $past_year)->where('fin_type', 'plus')->get()->sum('amount');
        
        
        
        // PERCENT FOR PAST-CURRENT MONTH
        if (!$finances_month_past) {
            $finances_past_current_month_percent = $finances_month / 1 * 100 - 100;
        } else {
            $finances_past_current_month_percent = $finances_month / $finances_month_past * 100 - 100;
        }
        

        // PERCENT FOR PAST-CURRENT YEAR
        if (!$finances_month_past) {
            $finances_past_current_year_percent = $finances_year / 1 * 100 - 100;
        } else {
            $finances_past_current_year_percent = $finances_year / $finances_year_past * 100 - 100;
        }

        // NEXT PAYMENTS
        $project_finance_est = Project::where('budget', '!=', '0')->sum('budget') - Finance::with('projects')->whereHas('projects', function ($query) { $query->where('budget', '!=', '0'); })->sum('amount');

        return view('finances.index', compact('finances', 'current_month', 'current_year', 'past_year', 'finances_month', 'finances_year', 'finances_year_past', 'finances_past_current_year_percent', 'finances_month_past', 'finances_past_current_month_percent', 'project_finance_est'));
        //dd($project_finance_est);
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
            'fin_type' => 'required',
        ]);

        $data = request()->all();
        $finance = new Finance();
        $finance->title = $data['title'];
        $finance->amount = $data['amount'];
        $finance->date = $data['date'];
        $finance->fin_type = $data['fin_type'];
        $finance->save();
        $finance->projects()->attach($request->projects, ['finance_id' => $finance->id]);
        return redirect('/finances');
    }

    public function edit($id)
    {
        $finance = Finance::find($id);
        $projects = Project::where('user_id', \Auth::user()->id)->latest()->get();
        return view('finances.edit', compact('finance', 'projects'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'projects' => 'required',
            'fin_type' => 'required',
        ]);

        $data = request()->all();
        $finance = Finance::find($id);
        $finance->title = $data['title'];
        $finance->amount = $data['amount'];
        $finance->date = $data['date'];
        $finance->fin_type = $data['fin_type'];
        $finance->save();
        $finance->projects()->detach();
        $finance->projects()->attach($request->projects, ['finance_id' => $finance->id]);
        return redirect('/finances');
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
