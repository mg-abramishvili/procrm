<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Finance;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('projects')->whereHas('projects', function ($query) {
            $query->where('projects.user_id', \Auth::user()->id);
        })->orderBy('created_at', 'desc')->paginate(200);

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $projects = Project::where('user_id', \Auth::user()->id)->latest()->get();
        return view('documents.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path() . '/uploads', $fileName);

        $document = new Document([
            'title' => $request->get('title'),
            'file' => $fileName,
        ]);

        $document->save();
        $document->projects()->attach($request->projects, ['document_id' => $document->id]);
        return redirect('/documents');
    }

    public function edit($id)
    {
        $document = Document::find($id);
        return response()->json($document);
    }

    public function update($id, Request $request)
    {
        $document = Document::find($id);
        $document->update($request->all());

        return response()->json('The document successfully updated');
    }

    public function show($id)
    {
        $document = Document::find($id);
        return response()->json($document);
    }

    public function delete($id)
    {
        $document = Document::find($id);
        $document->delete();

        return response()->json('The document successfully deleted');
    }
}
