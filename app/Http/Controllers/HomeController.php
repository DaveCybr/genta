<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $home = DB::table('tbl_home')->first();
        $about = DB::table('tbl_about')->first();
        $about2 = DB::table('tbl_about2')->first();
        $contact = DB::table('tbl_contact')->first();
        $gallery = DB::table('tbl_gallery')->first();
        $property = DB::table('tbl_property_agents')->first();
        $detail = DB::table('tbl_detail_property_agent')->get();
        $testimoni = DB::table('tbl_testimoni')->first();
        $client = DB::table('tbl_client_testimoni')->get();
        return view('layouts.main', compact('home', 'about', 'about2', 'contact', 'gallery', 'property', 'detail', 'testimoni', 'client'));
    }

    public function siteplan()
    {
        $polygons = DB::table('tbl_villa')->get();
        return view('layouts.siteplan', compact('polygons'));
    }

    public function villa()
    {
        $villa = DB::table('tbl_villa')->get();
        return view('villa.index', ['villa' => $villa]);
    }

    public function detail()
    {
        return view('villa.detail');
    }

    public function contact()
    {
        return view('contact.index');
    }
}
