@extends('layouts.master')

@section('title', 'Admin Home')

@section('content')
<div>
  <h1>Selamat Datang, {{ Session::get('user')->username }}</h1>
</div>
@endsection