<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function showPartners()
    {
        return response()->json(Partner::all());
    }

    public function showPartner($id)
    {
        return response()->json(Partner::find($id));
    }

    public function createPartner(Request $request)
    {
        $this->validate($request, [
            'person_id' => 'required',
            'partner_id' => 'required',
            'supplier' => 'required',
            'client' => 'required'
        ]);

        $partner = Partner::create($request->all());

        return response()->json($partner, 201);
    }

    public function updatePartner($id, Request $request)
    {
        $partner = Partner::findOrFail($id);
        $partner->Partner($request->all());

        return response()->json($partner, 200);
    }

    public function deletePartner($id)
    {
        Partner::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}