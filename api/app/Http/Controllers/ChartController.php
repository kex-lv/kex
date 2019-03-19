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

    public function importChart(Request $request)
    {
        $path = $request->file('chart_file')->getRealPath();
        $fp = fopen($path, 'r');
        $chartData = [];
        $i = 0;
        while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
            if ($i == 0){
               $i++;
               continue;
            }

            $chartData[] = [
                'name' => $row[0],
                'account' => $row[1],
                'type' => $row[2],
                'has_child' => $row[3],
                'parent_account' => $row[4],
            ];

            $i++;
        }

        foreach ($chartData as $chartEntry) {
            unset($chartEntry['parent_account']);
            $chartEntry['parent_id'] = 0;
            Chart::create($chartEntry);
        }

        $chart = Chart::all()->toArray();
        $chart = array_column($chart, 'id', 'account');
        foreach ($chartData as $chartEntry) {
            if ('' !== $chartEntry['parent_account']) {
                $account = Chart::findOrFail($chart[$chartEntry['account']]);
                $account->update(['parent_id' => $chart[$chartEntry['parent_account']]]);
            }
        }
    }
}