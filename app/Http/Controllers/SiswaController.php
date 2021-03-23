<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VNilai;

class SiswaController extends Controller
{
    public function home()
    {
        return view('siswa.home');
    }

    public function data(Request $request)
    {
        $nis = $request->session()->get('user')->nis;

        $data = VNilai::where('nis', $nis)->get();

        return view('siswa.nilai.data', ['data' => $data]);
    }
}
