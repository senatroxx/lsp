@extends('layouts.master')

@section('title', 'Admin - Data Mengajar')

@section('sidebar')
<form action="{{ route('admin.mengajar.insert') }}" method="post">
  @csrf
  <label for="nip">Guru</label>
  <select name="nip" id="nip">
    @foreach($guru as $item)
      <option value="{{ $item->nip }}">{{ $item->nama }}</option>
    @endforeach
  </select><br>

  <label for="mapel">Mapel</label>
  <select name="mapel" id="mapel">
    @foreach($mapel as $item)
      <option value="{{ $item->id }}">{{ $item->nama }}</option>
    @endforeach
  </select><br>

  <label for="kelas">Kelas</label>
  <select name="kelas" id="kelas">
    @foreach($kelas as $item)
      <option value="{{ $item->id }}">{{ $item->nama_kelas.' / '.$item->nama_jurusan }}</option>
    @endforeach
  </select><br>

  <input type="submit" value="Submit">
</form>
@endsection

@section('content')
<table class="table">
  <tr>
    <th>ID</th>
    <th>NIP</th>
    <th>Guru</th>
    <th>Mapel</th>
    <th>Kelas</th>
    <th>Aksi</th>
  </tr>
  @foreach($data as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->nip }}</td>
      <td>{{ $item->guru }}</td>
      <td>{{ $item->mapel }}</td>
      <td>{{ $item->kelas }}</td>
      <td>
        <a href="{{ route('admin.mengajar.edit', $item->id) }}">Edit</a>
        <a href="{{ route('admin.mengajar.destroy', $item->id) }}">Hapus</a>
      </td>
    </tr>
  @endforeach
</table>
@endsection