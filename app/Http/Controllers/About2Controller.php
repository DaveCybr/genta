<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class About2Controller extends Controller
{
    public function index()
    {
        $about2 = DB::table('tbl_about2')->first();
        return view('admin.about2.index', compact('about2'));
    }

    public function update(Request $request, $id)
    {
        try {

            DB::table('tbl_about2')->where('id_about2', $id)->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'daftar_poin1' => $request->input('daftar_poin1'),
                'daftar_poin2' => $request->input('daftar_poin2'),
                'daftar_poin3' => $request->input('daftar_poin3'),
            ]);

            $updateAbout2 = DB::table('tbl_about2')->where('id_about2', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'about2' => $updateAbout2]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
