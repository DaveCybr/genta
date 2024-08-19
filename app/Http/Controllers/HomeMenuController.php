<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeMenuController extends Controller
{
    public function index()
    {
        $home = DB::table('tbl_home')->first();
        return view('admin.home.index', compact('home'));
    }

    public function update(Request $request, $id)
    {
        try {
            $gambar1 = null;
            $gambar2 = null;
            $gambar3 = null;
            $gambar4 = null;
            $gambar5 = null;

            if ($request->hasFile('gambar1')) {
                $file = $request->file('gambar1');
                $gambar1 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = public_path('files');
                $filePath = $file->getRealPath();
                $outputPath = $tujuan_upload . '/' . $gambar1;

                resizeImage($filePath, $outputPath);
            }

            if ($request->hasFile('gambar2')) {
                $file = $request->file('gambar2');
                $gambar2 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = public_path('files');
                $filePath = $file->getRealPath();
                $outputPath = $tujuan_upload . '/' . $gambar2;

                resizeImage($filePath, $outputPath);
            }

            if ($request->hasFile('gambar3')) {
                $file = $request->file('gambar3');
                $gambar3 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = public_path('files');
                $filePath = $file->getRealPath();
                $outputPath = $tujuan_upload . '/' . $gambar3;

                resizeImage($filePath, $outputPath);
            }

            if ($request->hasFile('gambar4')) {
                $file = $request->file('gambar4');
                $gambar4 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = public_path('files');
                $filePath = $file->getRealPath();
                $outputPath = $tujuan_upload . '/' . $gambar4;

                resizeImage($filePath, $outputPath);
            }

            if ($request->hasFile('gambar5')) {
                $file = $request->file('gambar5');
                $gambar5 = time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = public_path('files');
                $filePath = $file->getRealPath();
                $outputPath = $tujuan_upload . '/' . $gambar5;

                resizeImage($filePath, $outputPath);
            }

            DB::table('tbl_home')->where('id_home', $id)->update([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'gambar1' => ($gambar1 != null) ? $gambar1 : $request->gambar1lama,
                'gambar2' => ($gambar2 != null) ? $gambar2 : $request->gambar2lama,
                'gambar3' => ($gambar3 != null) ? $gambar3 : $request->gambar3lama,
                'gambar4' => ($gambar4 != null) ? $gambar4 : $request->gambar4lama,
                'gambar5' => ($gambar5 != null) ? $gambar5 : $request->gambar5lama,
            ]);

            $updatedHome = DB::table('tbl_home')->where('id_home', $id)->first();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbarui', 'home' => $updatedHome]);
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
