<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Finance;
use App\Models\Document;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Task::with('projects')->orderBy('created_at', 'desc')->paginate(20);
        //return Project::with('tasks')->where('status', 'active')->has('tasks')->orderBy('created_at', 'desc')->paginate(20);
        return Project::with('tasks')->where('status', 'active')->orderBy('created_at', 'desc')->paginate(20);
    }

    public function add(Request $request)
    {
        $task = new Task([
            'title' => $request->get('title'),
        ]);
        $task->save();
        $task->projects()->attach($request->projects, ['task_id' => $task->id]);
        return response()->json('The task successfully added');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);
        $task->update($request->all());

        return response()->json('The task successfully updated');
    }

    public function view($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json('The task successfully deleted');
    }
}
