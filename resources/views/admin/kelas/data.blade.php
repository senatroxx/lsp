@extends('layouts.master')

@section('title', 'Admin - Data Kelas')

@section('sidebar')
<form action="{{ route('admin.kelas.insert') }}" method="post">
  @csrf
  <label for="nama">Nama Kelas</label>
  <input type="text" name="nama" id="nama"><br>

  <label for="jurusan">Jurusan</label>
  <select name="jurusan" id="jurusan">
    @foreach($jurusan as $item)
      <option value="{{ $item->id }}">{{ $item->nama }}</option>
    @endforeach
  </select><br>

  <input type="submit" value="Submit">
</form>
@endsection

@section('content')
<table class="table">
  <tr>
    <th>ID</th>
    <th>Nama Kelas</th>
    <th>Nama Jurusan</th>
    <th>Aksi</th>
  </tr>
  @foreach($data as $item)
  <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->nama_kelas }}</td>
    <td>{{ $item->nama_jurusan }}</td>
    <td>
      <a href="{{ route('admin.kelas.edit', $item->id) }}">Edit</a>
      <a href="{{ route('admin.kelas.destroy', $item->id) }}">Hapus</a>
    </td>
  </tr>
  @endforeach
</table>

@endsection