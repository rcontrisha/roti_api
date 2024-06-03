<?php

namespace App\Http\Controllers;

use App\Models\AccessRight;
use App\Models\Akun;
use Illuminate\Http\Request;

class AccessRightController extends Controller
{
    public function index()
    {
        $accessRights = AccessRight::with('user')->get();
        return response()->json($accessRights);
    }

    public function update(Request $request, $username)
    {
        $accessRight = AccessRight::where('username', $username)->first();
        if (!$accessRight) {
            return response()->json(['message' => 'Access rights not found'], 404);
        }

        $accessRight->update($request->only([
            'can_manage_account', 
            'can_manage_items', 
            'can_manage_transactions', 
            'can_manage_reports'
        ]));

        return response()->json($accessRight);
    }

    public function getByUsername($username)
    {
        $accessRight = AccessRight::where('username', $username)->first();
        if (!$accessRight) {
            return response()->json(['message' => 'Access rights not found for the specified username'], 404);
        }

        return response()->json($accessRight);
    }

    public function store(Request $request)
    {
        $accessRight = AccessRight::create($request->all());
        return response()->json($accessRight, 201);
    }
}
