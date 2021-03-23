@extends('layouts.master')

@section('title', 'Admin - Data Guru')

@section('sidebar')
<form action="{{ route('admin.guru.insert') }}" method="post">
  @csrf
  <label for="nip">NIP</label>
  <input type="number" name="nip" id="nip"><br>

  <label for="nama">Nama</label>
  <input type="text" name="nama" id="nama"><br>

  <label for="jk">Jenis Kelamin</label><br>
  <input type="radio" name="jk" id="jk" value="L">Laki-laki <br>
  <input type="radio" name="jk" id="jk" value="P">Perempuan <br>

  <label for="alamat">Alamat</label><br>
  <textarea name="alamat" id="alamat" cols="30" rows="3"></textarea><br>

  <label for="password">Password</label>
  <input type="password" name="password" id="password"><br>

  <input type="submit" value="Submit">
</form>
@endsection

@section('content')
<h2>Data Guru</h2><br>
<table class="table">
  <tr>
    <td>NIP</td>
    <td>Nama</td>
    <td>JK</td>
    <td>Alamat</td>
    <td>Aksi</td>
  </tr>
  @foreach($data as $item)
  <tr>
    <td>{{ $item->nip }}</td>
    <td>{{ $item->nama }}</td>
    <td>{{ $item->jk }}</td>
    <td>{{ $item->alamat }}</td>
    <td>
      <a href="{{ route('admin.guru.edit', $item->nip) }}">Edit</a>
      <a href="{{ route('admin.guru.destroy', $item->nip) }}">Hapus</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection