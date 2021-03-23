<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\VSiswa;
use App\Kelas;
use Validator;

class SiswaAdminController extends Controller
{
    public function data()
    {
        $data = VSiswa::all();
        $kelas = Kelas::all();

        return view('admin.siswa.data', ['data' => $data, 'kelas' => $kelas]);
    }

    public function edit($id)
    {
        $data = Siswa::where('nis', $id)->firstOrFail();
        $kelas = Kelas::all();

        return view('admin.siswa.edit', ['data' => $data, 'kelas' => $kelas]);
    }

    public function insert(Request $request)
    {
        Validator::make($request->all(), [
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama' => 'required|string',
            'jk' => 'required',
            'alamat' => 'required', 
            'password' => 'required',
            'kelas' => 'required'
        ])->validate();

        $data = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'password' => $request->password,
            'id_kelas' => $request->kelas
        ]);

        return redirect()->route('admin.siswa.data');
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'nama' => 'required|string',
            'jk' => 'required',
            'alamat' => 'required', 
            'password' => 'required',
            'kelas' => 'required'
        ])->validate();

        $siswa = Siswa::where('nis', $id)->firstOrFail();
        $siswa->nama = $request->nama;
        $siswa->jk = $request->jk;
        $siswa->alamat = $request->alamat;
        $siswa->password = $request->password;
        $siswa->id_kelas = $request->kelas;
        $siswa->save();

        return redirect()->route('admin.siswa.data');
    }

    public function destroy($id)
    {
        $siswa = Siswa::where('nis', $id)->firstOrFail();
        $siswa->delete();

        return redirect()->route('admin.siswa.data');
    }
}
