<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        return Akun::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_user' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:akun',
            'username' => 'required|string|max:50|unique:akun',
            'password' => 'required|string|min:6',
            'posisi' => 'required|string|max:50',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $akun = Akun::create($validated);

        return response()->json($akun, 201);
    }

    public function show($id)
    {
        $akun = Akun::findOrFail($id);

        return response()->json($akun);
    }

    public function update(Request $request, $id)
    {
        $akun = Akun::findOrFail($id);

        $validated = $request->validate([
            'nama_user' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|string|email|max:100|unique:akun,email,' . $akun->id,
            'username' => 'sometimes|required|string|max:50|unique:akun,username,' . $akun->id,
            'password' => 'sometimes|required|string|min:6',
            'posisi' => 'sometimes|required|string|max:50',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $akun->update($validated);

        return response()->json($akun);
    }

    public function destroy($id)
    {
        $akun = Akun::findOrFail($id);
        $akun->delete();

        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Mencari pengguna berdasarkan username
        $user = Akun::where('username', $request->username)->first();

        // Memeriksa apakah pengguna ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Kembalikan informasi user tanpa password
            return response()->json([
                'id' => $user->id,
                'nama_user' => $user->nama_user,
                'email' => $user->email,
                'username' => $user->username,
                'posisi' => $user->posisi,
            ]);
        }

        // Kembalikan respons error jika login gagal
        return response()->json(['error' => 'Invalid username or password'], 401);
    }
}
