<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Finance;
use App\Models\Document;
use App\Models\Client;
use App\Models\ProjectConfiguration;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', \Auth::user()->id)->latest()->paginate(200);
        $projects_active = Project::where('user_id', \Auth::user()->id)->where('status', 'active')->latest()->paginate(200);

        $project_conf = ProjectConfiguration::where('user_id', \Auth::user()->id)->latest()->first();
        
        return view('projects.index', compact('projects', 'projects_active', 'project_conf'));
        //dd($project_conf);
    }

    public function create()
    {
        $clients = Client::where('user_id', \Auth::user()->id)->get();
        return view('projects.create', compact('clients'));
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $clients = Client::where('user_id', \Auth::user()->id)->get();
        return view('projects.edit', compact('project', 'clients'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'budget' => 'required',
            'status' => 'required',
        ]);

        $data = request()->all();
        $project = new Project();
        $project->title = $data['title'];
        $project->budget = $data['budget'];
        $project->status = $data['status'];
        $project->comment = $data['comment'];
        $project->user_id = \Auth::user()->id;
        $project->save();
        $project->clients()->attach($request->clients, ['project_id' => $project->id]);
        return redirect('/projects');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'budget' => 'required',
            'status' => 'required',
        ]);

        $data = request()->all();
        $project = Project::find($data['id']);
        $project->title = $data['title'];
        $project->budget = $data['budget'];
        $project->status = $data['status'];
        $project->comment = $data['comment'];
        $project->save();
        $project->clients()->detach();
        $project->clients()->attach($request->clients, ['project_id' => $project->id]);
        return redirect('/projects');
    }

    public function show($id)
    {
        $project = Project::with(['finances' => function ($q) {
            $q->orderBy('date', 'desc');
          }])->find($id);

        return view('projects.show', compact('project'));
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->finances()->delete();
        $project->documents()->delete();
        $project->delete();
        return redirect('/projects');
    }
}
