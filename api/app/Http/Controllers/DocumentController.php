<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function showDocuments()
    {
        return response()->json(Document::all());
    }

    public function showDocument($id)
    {
        return response()->json(Document::find($id));
    }

    public function createDocument(Request $request)
    {
        $this->validate($request, [
            'nr' => 'required',
            'name' => 'required',
            'type' => 'required|alpha_dash'
        ]);

        $account = Document::create($request->all());

        return response()->json($account, 201);
    }

    public function updateDocument($id, Request $request)
    {
        $document = Document::findOrFail($id);
        $document->Document($request->all());

        return response()->json($document, 200);
    }

    public function deleteDocument($id)
    {
        Document::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}