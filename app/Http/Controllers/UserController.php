<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.user.index', compact('users'));
    }

    public function simpan(Request $request)
    {
        // Validasi input

        try {
            $newUserId = DB::table('users')->insertGetId([
                'name' => $request->input('name'),
                'password' => bcrypt($request->input('password')),
                'level' => "admin",
                'pw_input' => $request->input('password')
            ]);

            $newUser = DB::table('users')->where('id', $newUserId)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan', 'user' => $newUser]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        try {

            DB::table('users')->where('id', $id)->update([
                'name' => $request->input('name'),
                'password' => bcrypt($request->input('password')),
                'level' => "admin",
                'pw_input' => $request->input('password')
            ]);

            $updatedUser = DB::table('users')->where('id', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'user' => $updatedUser]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('users')->where('id', $id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
