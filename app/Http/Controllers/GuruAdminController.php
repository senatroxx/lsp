<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use Validator;
use Illuminate\Validation\Rule;


class GuruAdminController extends Controller
{
    public function data()
    {
        $data = Guru::all();

        return view('admin.guru.data', ['data' => $data]);
    }

    public function insert(Request $request)
    {
        Validator::make($request->all(), [
            'nip' => 'required|numeric|unique:guru,nip',
            'nama' => 'required|string',
            'jk' => 'required',
            'alamat' => 'required', 
            'password' => 'required',
        ])->validate();

        $data = Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.guru.data');
    }

    public function edit($id)
    {
        $data = Guru::where('nip', $id)->firstOrFail();

        return view('admin.guru.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'nama' => 'required|string',
            'jk' => 'required',
            'alamat' => 'required', 
            'password' => 'required',
        ])->validate();

        $data = Guru::where('nip', $id)->firstOrFail();
        $data->nama = $request->nama;
        $data->jk = $request->jk;
        $data->alamat = $request->alamat;
        $data->password = $request->password;
        $data->save();

        return redirect()->route('admin.guru.data');
    }

    public function destroy($id)
    {
        $data = Guru::where('nip', $id)->firstOrFail();
        $data->delete();

        return redirect()->route('admin.guru.data');
    }
}
