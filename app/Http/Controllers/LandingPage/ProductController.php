<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product
            = DB::table('tbl_villa')
            ->select('id_kategori', DB::raw('MIN(kategori) as kategori'), DB::raw('MIN(jml_kmr_mandi) as jm_km'), DB::raw('MIN(jml_kmr_tidur) as jm_kt'))
            ->groupBy('id_kategori')
            ->get();

        return view('layouts.product', ['product' => $product]);
    }

    public function product_detail($id)
    {
        $product
            = DB::table('tbl_villa')
            ->where('id_villa', $id)
            ->first();
        $polygon = DB::table('tbl_villa')->where('id_villa', $id)->get();

        return view('layouts.product_detail', ['product' => $product, 'polygon' => $polygon]);
    }

    public function product_kategori($id)
    {
        $product
            = DB::table('tbl_villa')
            ->where('id_kategori', $id)
            ->get();

        return response()->json($product);
    }
}
