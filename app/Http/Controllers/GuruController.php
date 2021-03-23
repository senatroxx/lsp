<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VMengajar;
use App\VNilai;
use App\Nilai;
use App\Siswa;
use App\Mengajar;

class GuruController extends Controller
{
    public function home()
    {
        return view('guru.home');
    }

    public function data(Request $request)
    {
        $nip = $request->session()->get('user')->nip;
        $kelas = VMengajar::where('nip', $nip)->get();
        $data = VNilai::where('nip', $nip)->get();

        return view('guru.nilai.data', ['kelas' => $kelas, 'data' => $data]);
    }

    public function create(Request $request, $id)
    {
        $nip = $request->session()->get('user')->nip;

        $data_mengajar = Mengajar::findOrFail($id);
        $data_siswa = Siswa::where('id_kelas', $data_mengajar->id_kelas)->get();
        $data_vmengajar = VMengajar::where('nip', $nip)->where('id', $data_mengajar->id)->get();

        return view('guru.nilai.create', ['data_siswa' => $data_siswa, 'data_vmengajar' => $data_vmengajar]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'siswa' => 'required',
            'mengajar' => 'required',
            'uh' => 'required',
            'uts' => 'required',
            'uas' => 'required',
        ]);

        $na = ($request->uh + $request->uts + $request->uas) / 3;
        $na = number_format($na, 2);

        Nilai::create([
            'nis' => $request->siswa,
            'id_mengajar' => $request->mengajar,
            'uh' => $request->uh,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'na' => $na
        ]);

        return redirect()->route('guru.nilai.data');
    }

    public function edit(Request $request, $id)
    {
        $data = VNilai::findOrFail($id);

        return view('guru.nilai.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'uh' => 'required',
            'uts' => 'required',
            'uas' => 'required',
        ]);

        $na = ($request->uh + $request->uts + $request->uas) / 3;
        $na = number_format($na, 2);

        $data = Nilai::findOrFail($id);
        $data->uh = $request->uh;
        $data->uts = $request->uts;
        $data->uas = $request->uas;
        $data->na = $na;
        $data->save();

        return redirect()->route('guru.nilai.data');
    }

    public function destroy($id)
    {
        $data = Nilai::findOrFail($id);
        $data->delete();

        return redirect()->route('guru.nilai.data');
    }
}
