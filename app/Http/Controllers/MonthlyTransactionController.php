<?php

namespace App\Http\Controllers;

use App\Models\MonthlyTransaction;
use Illuminate\Http\Request;

class MonthlyTransactionController extends Controller
{
    public function index()
    {
        return MonthlyTransaction::all();
    }

    public function store(Request $request)
    {
        return MonthlyTransaction::create($request->all());
    }

    public function show(MonthlyTransaction $monthlyTransaction)
    {
        return $monthlyTransaction;
    }

    public function update(Request $request, MonthlyTransaction $monthlyTransaction)
    {
        $monthlyTransaction->update($request->all());
        return $monthlyTransaction;
    }

    public function destroy(MonthlyTransaction $monthlyTransaction)
    {
        $monthlyTransaction->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
