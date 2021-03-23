@extends('layouts.master')

@section('title', 'Admin - Data Jurusan')

@section('sidebar')
<form action="{{ route('admin.jurusan.insert') }}" method="post">
  @csrf
  <label for="jurusan">Nama Jurusan</label>
  <input type="text" name="nama" id="jurusan">
  <input type="submit" value="Submit">
</form>
@endsection

@section('content')
<table class="table">
  <tr>
    <th>ID</th>
    <th>Nama Jurusan</th>
    <th>Aksi</th>
  </tr>
  @foreach($data as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->nama }}</td>
      <td>
        <a href="{{ route('admin.jurusan.edit', $item->id) }}">Edit</a>
        <a href="{{ route('admin.jurusan.destroy', $item->id) }}">Hapus</a>
      </td>
    </tr>
  @endforeach
</table>
@endsection