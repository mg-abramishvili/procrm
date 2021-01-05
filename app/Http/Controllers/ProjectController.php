<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Finance;
use App\Models\Document;
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

        return view('projects.index', compact('projects', 'projects_active'));
    }

    public function add(Request $request)
    {
        $project = new Project([
            'title' => $request->get('title'),
            'client' => $request->get('client'),
            'budget' => $request->get('budget'),
            'status' => $request->get('status'),
            'comment' => $request->get('comment'),
            'user_id' => \Auth::user()->id,
        ]);
        $project->save();

        return response()->json('The project successfully added');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'client' => 'required',
            'budget' => 'required',
            'status' => 'required',
        ]);

        $data = request()->all();
        $project = Project::find($data['id']);
        $project->title = $data['title'];
        $project->client = $data['client'];
        $project->budget = $data['budget'];
        $project->status = $data['status'];
        $project->comment = $data['comment'];
        $project->save();
        return redirect('/projects');
    }

    public function show($id)
    {
        $project = Project::with('finances', 'documents')->find($id);
        return view('projects.show', compact('project'));
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();

        return response()->json('The project successfully deleted');
    }
}
