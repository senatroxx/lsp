@extends('layouts.master')

@section('title', 'Admin - Edit Guru')

@section('content')
<br>
<form action="{{ route('admin.guru.update', $data->nip) }}" method="post">
  @csrf
  @method('put')
  <label for="nip">NIP</label>
  <input type="number" name="nip" id="nip" value="{{ $data->nip }}" readonly><br>

  <label for="nama">Nama</label>
  <input type="text" name="nama" id="nama" value="{{ $data->nama }}"><br>

  <label for="jk">Jenis Kelamin</label><br>
  <input type="radio" name="jk" id="jk" value="L" @if($data->jk == 'L') checked @endif>Laki-laki <br>
  <input type="radio" name="jk" id="jk" value="P" @if($data->jk == 'P') checked @endif>Perempuan <br>

  <label for="alamat">Alamat</label><br>
  <textarea name="alamat" id="alamat" cols="30" rows="3">{{ $data->alamat }}</textarea><br>

  <label for="password">Password</label>
  <input type="text" name="password" id="password" value="{{ $data->password }}"><br>

  <input type="submit" value="Submit">
</form><br>
@endsection