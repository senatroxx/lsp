@extends('layouts.master')

@section('title', 'Guru - Data Nilai')

@section('content')
<form action="{{ route('guru.nilai.insert') }}" method="post">
  @csrf

  <label>Nama Siswa</label>
  <select name="siswa" id="">
      @foreach ($data_siswa as $item)
      <option value="{{$item->nis}}">{{$item->nis}} | {{$item->nama}}</option>    
      @endforeach
  </select>
  <br>

  <label>Mapel</label>
  <select name="mengajar">
      @foreach ($data_vmengajar as $item)
      <option value="{{$item->id}}">{{$item->mapel}}</option>    
      @endforeach
  </select>
  <br>
  <label for="">Ulangan Harian</label><br>
  <input type="number" name="uh">
  <br>
  <label for="">Ulangan Tengah Semester</label><br>
  <input type="number" name="uts">
  <br>
  <label for="">Ulangan Akhir Semester</label><br>
  <input type="number" name="uas">

  <br>
  <button type="submit">Tambah</button>
</form>
@endsection