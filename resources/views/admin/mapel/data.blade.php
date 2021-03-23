@extends('layouts.master')

@section('title', 'Admin - Data Mapel')

@section('sidebar')
<form action="{{ route('admin.mapel.insert') }}" method="post">
  @csrf
  <label for="mapel">Nama Mapel</label>
  <input type="text" name="nama" id="mapel">
  <input type="submit" value="Submit">
</form>
@endsection

@section('content')
<table class="table">
  <tr>
    <th>ID</th>
    <th>Mapel</th>
    <th>Aksi</th>
  </tr>
  @foreach($data as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->nama }}</td>
      <td>
        <a href="{{ route('admin.mapel.edit', $item->id) }}">Edit</a>
        <a href="{{ route('admin.mapel.destroy', $item->id) }}">Hapus</a>
      </td>
    </tr>
  @endforeach
</table>
@endsection