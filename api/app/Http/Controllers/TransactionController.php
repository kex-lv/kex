<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function showTransactions()
    {
        return response()->json(Transaction::all());
    }

    public function showTransaction($id)
    {
        return response()->json(Transaction::find($id));
    }

    public function createTransaction(Request $request)
    {
        $this->validate($request, [
            'journal_id' => 'required',
            'account' => 'required',
            'debit_credit' => 'required|alpha',
            'amount' => 'required|numeric'
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction, 201);
    }

    public function updateTransaction($id, Request $request)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->Transaction($request->all());

        return response()->json($transaction, 200);
    }

    public function deleteTransaction($id)
    {
        Transaction::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}