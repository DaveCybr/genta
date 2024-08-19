<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_contact')->first();
        return view('admin.contact.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {

            DB::table('tbl_contact')->where('id_contact', $id)->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
            ]);

            $updatecontact = DB::table('tbl_contact')->where('id_contact', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'contact' => $updatecontact]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
