@extends('layouts.master')

@section('title', 'Admin - Edit Siswa')

@section('content')
<form action="{{ route('admin.siswa.update', $data->nis) }}" method="post">
  @csrf
  @method('put')
  <label for="nis">NIS</label>
  <input type="number" name="nis" id="NIS" value="{{ $data->nis }}" readonly><br>

  <label for="nama">Nama</label>
  <input type="text" name="nama" id="nama" value="{{ $data->nama }}"><br>

  <label for="jk">Jenis Kelamin</label><br>
  <input type="radio" name="jk" value="L" id="jk" @if($data->jk == 'L') checked @endif>Laki-Laki<br>
  <input type="radio" name="jk" value="P" id="jk" @if($data->jk == 'P') checked @endif>Perempuan<br>

  <label for="alamat">Alamat</label><br>
  <textarea name="alamat" id="alamat" cols="30" rows="3">{{ $data->alamat }}</textarea><br>

  <label for="password">Password</label>
  <input type="text" name="password" id="password" value="{{ $data->password }}"><br>

  <label for="kelas">Kelas</label>
  <select name="kelas" id="kelas">
    @foreach($kelas as $item)
      <option value="{{ $item->id }}" @if($data->id_kelas == $item->id) selected @endif>{{ $item->nama }}</option>
    @endforeach
  </select><br>

  <input type="submit" value="Submit">
</form>
@endsection