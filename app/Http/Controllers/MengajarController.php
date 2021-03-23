<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VMengajar;
use App\Mengajar;
use App\Guru;
use App\VKelas;
use App\Mapel;
use Illuminate\Validation\Rule;

class MengajarController extends Controller
{
    public function data()
    {
        $data = VMengajar::all();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $kelas = VKelas::all();

        return view('admin.mengajar.data', ['data' => $data, 'guru' => $guru, 'mapel' => $mapel, 'kelas' => $kelas]);
    }

    public function insert(Request $request)
    {
        $exist = Mengajar::where('id_mapel', $request->mapel)->where('id_kelas', $request->kelas)->count();
        if ($exist > 0) {
            return redirect()->route('admin.mengajar.data')->withErrors('Mapel sudah diajarkan pada kelas tersebut.');
        }

        Mengajar::create([
            'nip' => $request->nip,
            'id_mapel' => $request->mapel,
            'id_kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.mengajar.data');
    }

    public function edit($id)
    {
        $data = Mengajar::findOrFail($id);
        $nama_guru = Guru::where('nip', $data->nip)->firstOrFail();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $kelas = VKelas::all();

        return view('admin.mengajar.edit', ['data' => $data, 'guru' => $guru, 'mapel' => $mapel, 'kelas' => $kelas, 'nama_guru' => $nama_guru]);
    }

    public function update(Request $request, $id)
    {
        $exist = Mengajar::where('id_mapel', $request->mapel)->where('id_kelas', $request->kelas)->count();
        if ($exist > 0) {
            return redirect()->route('admin.mengajar.data')->withErrors('Mapel sudah diajarkan pada kelas tersebut.');
        }

        $data = Mengajar::findOrFail($id);
        $data->id_kelas = $request->kelas;
        $data->id_mapel = $request->mapel;
        $data->save();

        return redirect()->route('admin.mengajar.data');
    }

    public function destroy($id)
    {
        $data = Mengajar::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.mengajar.data');
    }
}
