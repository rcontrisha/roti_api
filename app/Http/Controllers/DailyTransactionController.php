<?php

namespace App\Http\Controllers;

use App\Models\DailyTransaction;
use Illuminate\Http\Request;

class DailyTransactionController extends Controller
{
    public function index()
    {
        return DailyTransaction::all();
    }

    public function store(Request $request)
    {
        return DailyTransaction::create($request->all());
    }

    public function show(DailyTransaction $dailyTransaction)
    {
        return $dailyTransaction;
    }

    public function update(Request $request, DailyTransaction $dailyTransaction)
    {
        $dailyTransaction->update($request->all());
        return $dailyTransaction;
    }

    public function destroy(DailyTransaction $dailyTransaction)
    {
        $dailyTransaction->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
