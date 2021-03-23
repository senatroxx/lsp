@extends('layouts.master')

@section('title', 'Admin - Edit Kelas')

@section('content')
<br>
<form action="{{ route('admin.kelas.update', $data->id) }}" method="post">
  @csrf
  @method('put')
  <label for="nama">Nama Kelas</label>
  <input type="text" name="nama" id="nama" value="{{ $data->nama }}"><br>

  <label for="jurusan">Jurusan</label>
  <select name="jurusan" id="jurusan">
    @foreach($jurusan as $item)
      <option value="{{ $item->id }}" @if($data->id_jurusan == $item->id) selected @endif>{{ $item->nama }}</option>
    @endforeach
  </select><br>

  <input type="submit" value="Submit">
</form>
@endsection