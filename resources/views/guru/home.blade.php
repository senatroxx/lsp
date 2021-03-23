@extends('layouts.master')

@section('title', 'Guru Home')

@section('content')
<div>
  <h1>Welcome, {{ Session::get('user')->nama }}</h1>
</div>
@endsection