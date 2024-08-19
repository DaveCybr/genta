<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VillaController extends Controller
{
    public function index()
    {
        $villa = DB::table('tbl_villa')->get();
        return view('admin.villa.index', compact('villa'));
    }

    public function map($id)
    {
        $villa = DB::table('tbl_villa')->where('id_villa', $id)->first();
        return view('admin.villa.map', compact('villa'));
    }

    public function simpan(Request $request)
    {
        // Validasi input

        try {
            $luas = $request->input('luas') . ' ' .  $request->input('satuan');
            $harga = str_replace('.', '', $request->input('harga'));

            $newVillaId = DB::table('tbl_villa')->insertGetId([
                'nama_villa' => $request->input('nama_villa'),
                'status' => $request->input('status'),
                'harga' => $harga,
                'luas' => $luas,
                'uraian' => $request->input('uraian'),
                'jml_kmr_tidur' => '0',
                'jml_kmr_mandi' => '0',
            ]);

            $newVilla = DB::table('tbl_villa')->where('id_villa', $newVillaId)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan', 'villa' => $newVilla]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    public function edit($id)
    {
        $user = DB::table('tbl_villa')->where('id_villa', $id)->first();
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        try {
            $harga = str_replace('.', '', $request->input('harga'));

            DB::table('tbl_villa')->where('id_villa', $id)->update([
                'nama_villa' => $request->input('nama_villa'),
                'status' => $request->input('status'),
                'harga' => $harga,
                'luas' => $request->input('luas') . " " . "m²",
                'uraian' => $request->input('uraian'),
                'jml_kmr_tidur' => $request->input('jml_kmr_tidur'),
                'jml_kmr_mandi' => $request->input('jml_kmr_mandi'),
                'polygon' => $request->input('polygon'),
            ]);

            $updatedVilla = DB::table('tbl_villa')->where('id_villa', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'villa' => $updatedVilla]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function updatemap(Request $request, $id)
    {
        // Validasi input
        try {

            DB::table('tbl_villa')->where('id_villa', $id)->update([
                'luas' => $request->input('luas') . " " . "m²",
                'polygon' => $request->input('polygon'),
            ]);


            return response()->json(['status' => 'success', 'message' => 'Polygon berhasil diperbarui']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function tambahGambar(Request $request, $id)
    {
        try {
            $gbr_ruangtamu = null;
            $gbr_kolam = null;
            $gbr_rooftop = null;
            $gbr_carport = null;
            $gbr_ruangkeluarga = null;
            $gbr_bathroom = null;
            $gbr_spa = null;
            $gbr_kamar1 = null;
            $gbr_kamar2 = null;
            $gbr_kamar3 = null;

            if ($request->hasFile('gbr_ruang_tamu') != null) {
                $file = $request->file('gbr_ruang_tamu');
                $gbr_ruangtamu = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_ruangtamu);
            }

            if ($request->hasFile('gbr_kolam') != null) {
                $file = $request->file('gbr_kolam');
                $gbr_kolam = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_kolam);
            }

            if ($request->hasFile('gbr_rooftop') != null) {
                $file = $request->file('gbr_rooftop');
                $gbr_rooftop = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_rooftop);
            }

            if ($request->hasFile('gbr_carport') != null) {
                $file = $request->file('gbr_carport');
                $gbr_carport = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_carport);
            }

            if ($request->hasFile('gbr_ruang_keluarga') != null) {
                $file = $request->file('gbr_ruang_keluarga');
                $gbr_ruangkeluarga = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_ruangkeluarga);
            }

            if ($request->hasFile('gbr_bathroom') != null) {
                $file = $request->file('gbr_bathroom');
                $gbr_bathroom = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_bathroom);
            }

            if ($request->hasFile('gbr_spa') != null) {
                $file = $request->file('gbr_spa');
                $gbr_spa = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_spa);
            }

            if ($request->hasFile('gbr_kamar1') != null) {
                $file = $request->file('gbr_kamar1');
                $gbr_kamar1 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_kamar1);
            }

            if ($request->hasFile('gbr_kamar2') != null) {
                $file = $request->file('gbr_kamar2');
                $gbr_kamar2 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_kamar2);
            }

            if ($request->hasFile('gbr_kamar3') != null) {
                $file = $request->file('gbr_kamar3');
                $gbr_kamar3 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files';
                $file->move($tujuan_upload, $gbr_kamar3);
            }

            DB::table('tbl_villa')->where('id_villa', $id)->update([
                'gbr_ruang_tamu' => ($gbr_ruangtamu != null) ? $gbr_ruangtamu : $request->RuangTamuLama,
                'gbr_kolam' => ($gbr_kolam != null) ? $gbr_kolam : $request->kolamLama,
                'gbr_rooftop' => ($gbr_rooftop != null) ? $gbr_rooftop : $request->rooftopLama,
                'gbr_carport' => ($gbr_carport != null) ? $gbr_carport : $request->carportLama,
                'gbr_ruang_keluarga' => ($gbr_ruangkeluarga != null) ? $gbr_ruangkeluarga : $request->ruangKeluargaLama,
                'gbr_bathroom' => ($gbr_bathroom != null) ? $gbr_bathroom : $request->bathroomLama,
                'gbr_spa' => ($gbr_spa != null) ? $gbr_spa : $request->spaLama,
                'gbr_kamar1' => ($gbr_kamar1 != null) ? $gbr_kamar1 : $request->kamar1Lama,
                'gbr_kamar2' => ($gbr_kamar2 != null) ? $gbr_kamar2 : $request->kamar2Lama,
                'gbr_kamar3' => ($gbr_kamar3 != null) ? $gbr_kamar3 : $request->kamar3Lama,
            ]);

            $updatedVilla = DB::table('tbl_villa')->where('id_villa', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'villa' => $updatedVilla]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('tbl_villa')->where('id_villa', $id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
