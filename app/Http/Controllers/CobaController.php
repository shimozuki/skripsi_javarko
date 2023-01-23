<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        $coba = DB::table('Cobas')->select('name', 'alamat', 'no_tlpn')->get();
        echo "<pre>";
        print_r($coba);
        echo "</pre>";
    }
}
