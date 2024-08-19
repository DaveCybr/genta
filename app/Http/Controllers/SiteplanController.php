<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteplanController extends Controller
{
    public function index()
    {
        $siteplan = DB::table('tbl_siteplan')->first();
        return view('admin.siteplan.index', compact('siteplan'));
    }

    public function update(Request $request, $id)
    {
        try {

            DB::table('tbl_siteplan')->where('id_siteplan', $id)->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
            ]);

            $updateSiteplan = DB::table('tbl_siteplan')->where('id_siteplan', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'siteplan' => $updateSiteplan]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
