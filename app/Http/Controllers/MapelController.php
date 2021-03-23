<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use Validator;

class MapelController extends Controller
{
    public function data()
    {
        $data = Mapel::all();

        return view('admin.mapel.data', ['data' => $data]);
    }

    public function insert(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => 'required|string|unique:mapel,nama'
        ]);

        Mapel::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('admin.mapel.data');
    }

    public function edit($id)
    {
        $data = Mapel::findOrFail($id);

        return view('admin.mapel.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'nama' => 'required|string|unique:mapel,nama,'.$id
        ]);

        $data = Mapel::findOrFail($id);
        $data->nama = $request->nama;
        $data->save();

        return redirect()->route('admin.mapel.data');
    }

    public function destroy($id)
    {
        $data = Mapel::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.mapel.data');
    }
}
