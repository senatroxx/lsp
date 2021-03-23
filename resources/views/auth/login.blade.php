@extends('layouts.master')

@section('title', 'Login')

@section('sidebar')
<form action="{{ route('login', $role) }}" method="post">
  <table>
    @csrf
    <tr>
      @if($role == 'siswa')
        <td>
          <label for="nis">NIS</label>
        </td>
        <td>
          <input required autofocus type="number" name="nis" id="nis">
        </td>
      @elseif($role == 'guru')
        <td>
          <label for="nip">NIP</label>
        </td>
        <td>
          <input required autofocus type="number" name="nip" id="nip">
        </td>
      @elseif($role == 'admin')
        <td>
          <label for="username">Username</label>
        </td>
        <td>
          <input required autofocus type="text" name="username" id="username">
        </td>
      @endif
    </tr>
    <tr>
      <td>
        <label for="password">Password</label>
      </td>
      <td>
        <input required type="password" name="password" id="password">
      </td>
    </tr>
  </table>

    <input type="submit" value="Login">
</form>
@endsection