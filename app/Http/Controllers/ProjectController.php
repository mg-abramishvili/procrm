<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        return Project::latest()->paginate(20);
    }

    public function add(Request $request)
    {
        $project = new Project([
            'title' => $request->get('title'),
            'client' => $request->get('client'),
            'budget' => $request->get('budget'),
            'status' => $request->get('status'),
        ]);
        $project->save();

        return response()->json('The project successfully added');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    public function update($id, Request $request)
    {
        $project = Project::find($id);
        $project->update($request->all());

        return response()->json('The project successfully updated');
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();

        return response()->json('The project successfully deleted');
    }
}
