@extends('layouts.master')

@section('title', 'Guru - Data Nilai')

@section('content')
<form action="{{ route('guru.nilai.update', $data->id) }}" method="post">
  @csrf
  @method('put')

  <label>Nama Siswa</label>
  <input type="text" name="nama" id="nama" readonly value="{{ $data->nama_siswa }}">
  <br>
  <label for="">Ulangan Harian</label><br>
  <input type="number" name="uh" value="{{ $data->uh }}">
  <br>
  <label for="">Ulangan Tengah Semester</label><br>
  <input type="number" name="uts" value="{{ $data->uts }}">
  <br>
  <label for="">Ulangan Akhir Semester</label><br>
  <input type="number" name="uas" value="{{ $data->uas }}">

  <br>
  <button type="submit">Submit</button>
</form>
@endsection