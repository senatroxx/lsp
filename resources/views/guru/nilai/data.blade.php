@extends('layouts.master')

@section('title', 'Guru - Data Nilai')

@section('sidebar')
<h2>Data Mengajar</h2>
<table class="table">
  <tr>
    <th>ID</th>
    <th>Mapel</th>
    <th>Kelas</th>
    <th>Aksi</th>
  </tr>
  @foreach($kelas as $item)
  <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->mapel }}</td>
    <td>{{ $item->kelas }}</td>
    <td>
      <a href="{{ route('guru.nilai.create', $item->id) }}">Tambah Nilai</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection

@section('content')
<h2>Daftar Nilai</h2>
<table border>
  <tr>
    <th>No</th>
    <th>NIS</th>
    <th>Nama Siswa</th>
    <th>NIP</th>
    <th>Nama Guru</th>
    <th>Kelas</th>
    <th>Mapel</th>
    <th>Jurusan</th>
    <th>UH</th>
    <th>UTS</th>
    <th>UAS</th>
    <th>NA</th>
    <th>Aksi</th>
  </tr>
  @foreach($data as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $item->nis }}</td>
      <td>{{ $item->nama_siswa }}</td>
      <td>{{ $item->nip }}</td>
      <td>{{ $item->nama_guru }}</td>
      <td>{{ $item->nama_kelas }}</td>
      <td>{{ $item->nama_mapel }}</td>
      <td>{{ $item->nama_jurusan }}</td>
      <td>{{ $item->uh }}</td>
      <td>{{ $item->uts }}</td>
      <td>{{ $item->uas }}</td>
      <td>{{ $item->na }}</td>
      <td>
        <a href="{{ route('guru.nilai.edit', $item->id) }}">Edit</a>
        <a href="{{ route('guru.nilai.destroy', $item->id) }}">Hapus</a>
      </td>
    </tr>
  @endforeach
</table>
@endsection