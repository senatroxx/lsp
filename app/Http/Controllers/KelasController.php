<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VKelas;
use App\Jurusan;
use App\Kelas;

class KelasController extends Controller
{
    public function data()
    {
        $data = VKelas::all();
        $jurusan = Jurusan::all();

        return view('admin.kelas.data', ['data' => $data, 'jurusan' => $jurusan]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jurusan' => 'required|numeric'
        ]);

        Kelas::create([
            'nama' => $request->nama,
            'id_jurusan' => $request->jurusan
        ]);

        return redirect()->route('admin.kelas.data');
    }

    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('admin.kelas.edit', ['data' => $data, 'jurusan' => $jurusan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'jurusan' => 'required|numeric'
        ]);

        $data = Kelas::findOrFail($id);
        $data->nama = $request->nama;
        $data->id_jurusan = $request->jurusan;
        $data->save();

        return redirect()->route('admin.kelas.data');
    }

    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.kelas.data');
    }
}
