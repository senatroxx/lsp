<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
  <div class="container">
    <div class="header"></div>
    <div class="navbar">
      <ul>
        @if(Session::get('role') == 'admin')
          <li><a href="{{ route('admin.home') }}">Home</a></li>
          <li><a href="{{ route('admin.siswa.data') }}">Data Siswa</a></li>
          <li><a href="{{ route('admin.guru.data') }}">Data Guru</a></li>
          <li><a href="{{ route('admin.kelas.data') }}">Data Kelas</a></li>
          <li><a href="{{ route('admin.jurusan.data') }}">Data Jurusan</a></li>
          <li><a href="{{ route('admin.mapel.data') }}">Data Mapel</a></li>
          <li><a href="{{ route('admin.mengajar.data') }}">Data Mengajar</a></li>
          <li><a href="{{ route('logout', 'admin') }}">Logout</a></li>
        @elseif(Session::get('role') == 'guru')
          <li><a href="{{ route('guru.home') }}">Home</a></li>
          <li><a href="{{ route('guru.nilai.data') }}">Data Nilai</a></li>
          <li><a href="{{ route('logout', 'guru') }}">Logout</a></li>
        @elseif(Session::get('role') == 'siswa')
          <li><a href="{{ route('siswa.home') }}">Home</a></li>
          <li><a href="{{ route('siswa.nilai.data') }}">Data Nilai</a></li>
          <li><a href="{{ route('logout', 'siswa') }}">Logout</a></li>
        @elseif(!Session::has('user'))
          <li><a href="{{ route('login', 'admin') }}">Admin</a></li>
          <li><a href="{{ route('login', 'siswa') }}">Siswa</a></li>
          <li><a href="{{ route('login', 'guru') }}">Guru</a></li>
        @endif
      </ul>
      <div class="clear-both"></div>
    </div>
    <div class="content">
      @if(Session::has('user') && Session::get('role') !== 'siswa')
        <div class="sidebar">
          @yield('sidebar')
        </div>
        <div class="main">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          @yield('content')
        </div>
      @else
        <div class="main" style="grid-column: span 12 / span 12;">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @yield('content')
        </div>
      @endif
    </div>
  </div>
</body>
</html>