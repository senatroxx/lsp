@extends('layouts.master')

@section('title', 'Admin - Edit Mapel')

@section('content')
<br>
<form action="{{ route('admin.mapel.update', $data->id) }}" method="post">
  @csrf
  @method('put')
  <label for="mapel">Nama Mapel</label>
  <input type="text" name="nama" id="mapel" value="{{ $data->nama }}">
  <input type="submit" value="Submit">
</form>
@endsection