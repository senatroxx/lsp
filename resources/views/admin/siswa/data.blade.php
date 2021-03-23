@extends('layouts.master')

@section('title', 'Admin - Data Siswa')

@section('sidebar')
<form action="{{ route('admin.siswa.insert') }}" method="post">
@csrf
<label for="nis">NIS</label>
<input type="number" name="nis" id="NIS"><br>

<label for="nama">Nama</label>
<input type="text" name="nama" id="nama"><br>

<label for="jk">Jenis Kelamin</label><br>
<input type="radio" name="jk" value="L" id="jk">Laki-Laki<br>
<input type="radio" name="jk" value="P" id="jk">Perempuan<br>

<label for="alamat">Alamat</label><br>
<textarea name="alamat" id="alamat" cols="30" rows="3"></textarea><br>

<label for="password">Password</label>
<input type="password" name="password" id="password"><br>

<label for="kelas">Kelas</label>
<select name="kelas" id="kelas">
  @foreach($kelas as $item)
    <option value="{{ $item->id }}">{{ $item->nama }}</option>
  @endforeach
</select><br>

<input type="submit" value="Submit">
</form>
@endsection

@section('content')
<h2>Data Siswa</h2><br>
<table class="table">
  <tr>
    <th>NIS</th>
    <th>Nama</th>
    <th>JK</th>
    <th>Alamat</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <th>Aksi</th>
  </tr>
  @foreach($data as $item)
    <tr>
      <td>{{ $item->nis }}</td>
      <td>{{ $item->nama_siswa }}</td>
      <td>{{ $item->jk }}</td>
      <td>{{ $item->alamat }}</td>
      <td>{{ $item->kelas }}</td>
      <td>{{ $item->jurusan }}</td>
      <td>
        <a href="{{ route('admin.siswa.edit', $item->nis) }}">Edit</a>
        <a href="{{ route('admin.siswa.destroy', $item->nis) }}">Hapus</a>
      </td>
    </tr>
  @endforeach
</table>
@endsection