@extends('layouts.master')

@section('title', 'Admin - Data Mengajar')

@section('content')
<br>
<form action="{{ route('admin.mengajar.update', $data->id) }}" method="post">
  @csrf
  @method('put')
  <label for="nip">Guru</label>
  <input type="text" name="nip" id="nip" value="{{ $data->nip.' / '.$nama_guru->nama }}" readonly><br>

  <label for="mapel">Mapel</label>
  <select name="mapel" id="mapel">
    @foreach($mapel as $item)
      <option value="{{ $item->id }}" @if($data->id_mapel == $item->id) selected @endif>{{ $item->nama }}</option>
    @endforeach
  </select><br>

  <label for="kelas">Kelas</label>
  <select name="kelas" id="kelas">
    @foreach($kelas as $item)
      <option value="{{ $item->id }}" @if($data->id_kelas == $item->id) selected @endif>{{ $item->nama_kelas.' / '.$item->nama_jurusan }}</option>
    @endforeach
  </select><br>

  <input type="submit" value="Submit">
</form>
@endsection