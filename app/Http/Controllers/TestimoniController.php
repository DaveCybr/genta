<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimoniController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_testimoni')->first();
        $detail = DB::table('tbl_client_testimoni')->get();
        return view('admin.testimoni.index', compact(['data','detail']));
    }

    public function update(Request $request, $id)
    {
        try {

            DB::table('tbl_testimoni')->where('id_testimoni', $id)->update([
                'judul' => $request->input('judul'),
                'paragraf' => $request->input('paragraf'),
            ]);

            $updatedtestimoni = DB::table('tbl_testimoni')->where('id_testimoni', $id)->first();

            // $detail = $request->input('detail');
            // $foto = null;

            // foreach ($detail as $index => $data) {
            //     if (isset($data['foto']) && $data['foto'] !== null) {
            //         $file = $data['foto'];
            //         $foto = time() . "_" . $file->getClientOriginalName();
            //         $tujuan_upload = public_path('files');
            //         $filePath = $file->getRealPath();
            //         $outputPath = $tujuan_upload . '/' . $foto;

            //         // Lakukan resize gambar jika dibutuhkan
            //         resizeImage($filePath, $outputPath);
            //     }

            //     // Lakukan update data
            //     DB::table('tbl_detail_property_agent')->where('id_detail_property_agent', $data['id_detail_property_agent'])->update([
            //         'nama' => $data['nama'],
            //         'jabatan' => $data['jabatan'],
            //         'foto' => ($foto != null) ? $foto : $data['foto_lama'],  // Jika tidak ada file, simpan null atau pertahankan nilai lama
            //         'facebook' => $data['facebook'],
            //         'instagram' => $data['instagram'],
            //     ]);
            //     $updatedagent = DB::table('tbl_detail_property_agent')->get();
            // }

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui',
                'testimoni' => $updatedtestimoni,
                // 'agent' => $updatedagent,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}

function resizeImage($filePath, $outputPath, $width = 1000, $height = 1000) {
    list($originalWidth, $originalHeight, $imageType) = getimagesize($filePath);

    $aspectRatio = $originalWidth / $originalHeight;

    if ($width / $height > $aspectRatio) {
        $newWidth = $height * $aspectRatio;
        $newHeight = $height;
    } else {
        $newWidth = $width;
        $newHeight = $width / $aspectRatio;
    }

    $srcImage = null;
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $srcImage = imagecreatefromjpeg($filePath);
            break;
        case IMAGETYPE_PNG:
            $srcImage = imagecreatefrompng($filePath);
            break;
        case IMAGETYPE_GIF:
            $srcImage = imagecreatefromgif($filePath);
            break;
    }

    if (!$srcImage) {
        throw new \Exception('Unsupported image type');
    }

    $dstImage = imagecreatetruecolor($width, $height);
    imagefill($dstImage, 0, 0, imagecolorallocate($dstImage, 255, 255, 255)); // fill with white background

    imagecopyresampled(
        $dstImage, $srcImage,
        ($width - $newWidth) / 2, ($height - $newHeight) / 2,
        0, 0, $newWidth, $newHeight,
        $originalWidth, $originalHeight
    );

    switch ($imageType) {
        case IMAGETYPE_JPEG:
            imagejpeg($dstImage, $outputPath);
            break;
        case IMAGETYPE_PNG:
            imagepng($dstImage, $outputPath);
            break;
        case IMAGETYPE_GIF:
            imagegif($dstImage, $outputPath);
            break;
    }

    imagedestroy($srcImage);
    imagedestroy($dstImage);
}
