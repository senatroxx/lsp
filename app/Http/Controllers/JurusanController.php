<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
{
    public function data()
    {
        $data = Jurusan::all();

        return view('admin.jurusan.data', ['data' => $data]);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required|string'
        ]);

        Jurusan::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('admin.jurusan.data');
    }

    public function edit($id)
    {
        $data = Jurusan::findOrFail($id);

        return view('admin.jurusan.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string'
        ]);

        $data = Jurusan::findOrFail($id);
        $data->nama = $request->nama;
        $data->save();

        return redirect()->route('admin.jurusan.data');
    }

    public function destroy($id)
    {
        $data = Jurusan::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.jurusan.data');
    }
}
