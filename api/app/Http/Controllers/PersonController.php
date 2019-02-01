<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function showPersons()
    {
        return response()->json(Person::all());
    }

    public function showPerson($id)
    {
        return response()->json(Person::find($id));
    }

    public function createPerson(Request $request)
    {
        $this->validate($request, [
            'personal_nr' => 'required',
            'name' => 'required',
            'surname' => 'required'
        ]);

        $person = Person::create($request->all());

        return response()->json($person, 201);
    }

    public function updatePerson($id, Request $request)
    {
        $person = Person::findOrFail($id);
        $person->Person($request->all());

        return response()->json($person, 200);
    }

    public function deletePerson($id)
    {
        Person::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}