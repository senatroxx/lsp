@extends('layouts.master')

@section('title', 'Guru - Data Nilai')

@section('content')
<h2>Data Nilai</h2><br>
<table class="table">
  <tr>
    <th>ID</th>
    <th>Nama Guru</th>
    <th>Mapel</th>
    <th>UH</th>
    <th>UTS</th>
    <th>UAS</th>
    <th>NA</th>
  </tr>
  @foreach($data as $item)
  <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->nama_guru }}</td>
    <td>{{ $item->nama_mapel }}</td>
    <td>{{ $item->uh }}</td>
    <td>{{ $item->uts }}</td>
    <td>{{ $item->uas }}</td>
    <td>{{ $item->na }}</td>
  </tr>
  @endforeach
</table>
@endsection