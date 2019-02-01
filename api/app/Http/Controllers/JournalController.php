<?php

namespace App\Http\Controllers;

use App\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{

    public function showJournal()
    {
        return response()->json(Journal::all());
    }

    public function showEntry($id)
    {
        return response()->json(Journal::find($id));
    }

    public function createEntry(Request $request)
    {
        $this->validate($request, [
            'person_id' => 'required',
            'partner_id' => 'required',
            'supplier' => 'required',
            'client' => 'required'
        ]);

        $entry = Journal::create($request->all());

        return response()->json($entry, 201);
    }

    public function updateEntry($id, Request $request)
    {
        $entry = Journal::findOrFail($id);
        $entry->Journal($request->all());

        return response()->json($entry, 200);
    }

    public function deleteEntry($id)
    {
        Journal::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}