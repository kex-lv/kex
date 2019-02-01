<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    public function showOrganizations()
    {
        return response()->json(Organization::all());
    }

    public function showOrganization($id)
    {
        return response()->json(Organization::find($id));
    }

    public function createOrganization(Request $request)
    {
        $this->validate($request, [
            'reg_nr' => 'required',
            'name' => 'required',
            'org_type' => 'required|alpha_dash'
        ]);

        $organization = Organization::create($request->all());

        return response()->json($organization, 201);
    }

    public function updateOrganization($id, Request $request)
    {
        $organization = Organization::findOrFail($id);
        $organization->Organization($request->all());

        return response()->json($organization, 200);
    }

    public function deleteOrganization($id)
    {
        Organization::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}