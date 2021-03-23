@extends('layouts.master')

@section('title', 'Admin - Edit Jurusan')

@section('content')
<br>
<form action="{{ route('admin.jurusan.update', $data->id) }}" method="post">
  @csrf
  @method('put')
  <label for="jurusan">Nama Jurusan</label>
  <input type="text" name="nama" id="jurusan" value="{{ $data->nama }}">
  <input type="submit" value="Submit">
</form>
@endsection