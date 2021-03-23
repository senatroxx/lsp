@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="login-container">
  <form action="{{ route('login', $role) }}" method="post" class="login-form">
    @csrf
      @if($role == 'siswa')
        <h2>Login Siswa</h2>
        <input required autofocus type="number" name="nis" id="nis" placeholder="NIS">
      @elseif($role == 'guru')
        <h2>Login Guru</h2>
        <input required autofocus type="number" name="nip" id="nip" placeholder="NIP">
      @elseif($role == 'admin')
        <h2>Login Admin</h2>
        <input required autofocus type="text" name="username" id="username" placeholder="Username">
      @endif
        <input required type="password" name="password" id="password" placeholder="Password">

    <input type="submit" value="Login">
  </form>
</div>
@endsection