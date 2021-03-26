@extends('layouts.master')

@section('title', 'Admin - Edit Siswa')

@section('content')
<form action="{{ route('admin.siswa.update', $data->nis) }}" method="post">
  @csrf
  @method('put')
  <table>
    <tr>
      <td><label for="nis">NIS</label></td>
      <td><input type="number" name="nis" id="NIS" value="{{ $data->nis }}" readonly></td>
    </tr>

    <tr>
      <td><label for="nama">Nama</label></td>
      <td><input type="text" name="nama" id="nama" value="{{ $data->nama }}"></td>
    </tr>

    <tr>
      <td><label for="jk">Jenis Kelamin</label><br></td>
      <td>
        <input type="radio" name="jk" value="L" id="jk" @if($data->jk == 'L') checked @endif>Laki-Laki <br>
        <input type="radio" name="jk" value="P" id="jk" @if($data->jk == 'P') checked @endif>Perempuan
      </td>
    </tr>

    <tr>
      <td><label for="alamat">Alamat</label></td>
      <td><textarea name="alamat" id="alamat" cols="30" rows="3">{{ $data->alamat }}</textarea></td>
    </tr>

    <tr>
      <td><label for="password">Password</label></td>
      <td><input type="text" name="password" id="password" value="{{ $data->password }}"></td>
    </tr>

    <tr>
      <td><label for="kelas">Kelas</label></td>
      <td>
        <select name="kelas" id="kelas">
          @foreach($kelas as $item)
            <option value="{{ $item->id }}" @if($data->id_kelas == $item->id) selected @endif>{{ $item->nama }}</option>
          @endforeach
        </select>
      </td>
    </tr>

    <tr>
      <td colspan='2'><input type="submit" value="Submit"></td>
    </tr>
  </table>
</form>
@endsection