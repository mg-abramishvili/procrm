<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Finance;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Document::with('projects')->orderBy('date', 'desc')->paginate(20);
    }

    public function add(Request $request)
    {
        $document = new Document([
            'title' => $request->get('title'),
            'file' => $request->get('file'),
        ]);
        $document->save();
        $document->projects()->attach($request->projects, ['document_id' => $document->id]);
        return response()->json('The document successfully added');
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

    public function view($id)
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
