<?php

namespace App\Http\Controllers;

use App\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    public function showChart()
    {
        return response()->json(Chart::all());
    }

    public function showAccount($id)
    {
        return response()->json(Chart::find($id));
    }

    public function createAccount(Request $request)
    {
        $this->validate($request, [
            'account' => 'required|unique:chart',
            'name' => 'required',
            'type' => 'required|alpha_dash'
        ]);

        $account = Chart::create($request->all());

        return response()->json($account, 201);
    }

    public function updateAccount($id, Request $request)
    {
        $account = Chart::findOrFail($id);
        $account->update($request->all());

        return response()->json($account, 200);
    }

    public function deleteAccount($id)
    {
        Chart::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}