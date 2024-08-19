<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('tbl_about')->first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request, $id)
    {
        try {
            $video = null;

            if ($request->hasFile('video') != null) {
                $file = $request->file('video');
                $video = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'files/videos';
                $file->move($tujuan_upload, $video);
            }

            DB::table('tbl_about')->where('id_about', $id)->update([
                'judul' => $request->input('judul'),
                'paragraf' => $request->input('paragraf'),
                'daftar_poin1' => $request->input('daftar_poin1'),
                'daftar_poin2' => $request->input('daftar_poin2'),
                'daftar_poin3' => $request->input('daftar_poin3'),
                'video' => ($video != null) ? $video : $request->videoLama,
            ]);

            $updateAbout = DB::table('tbl_about')->where('id_about', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'about' => $updateAbout]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}