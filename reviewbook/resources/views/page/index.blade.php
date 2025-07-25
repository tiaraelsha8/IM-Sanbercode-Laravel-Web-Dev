@extends('layouts.master')

@section('tittle')
    Home
@endsection

@section('content')


@if (session('success'))
    <div class="alert alert-success">
          {{ session('success') }}
    </div>
    
@endif

@if (session('danger'))
    <div class="alert alert-danger">
          {{ session('danger') }}
    </div>
    
@endif

@if (Auth::check())
    <h1>Selamat Datang {{ Auth()->user()->name }} 
    @if (Auth()->user()->profil)
    ({{Auth()->user()->profile->age}} tahun)    
    @else

    @endif
@else
    <h1>Selamat Datang, Pengunjung</h1>
@endif

    <h1>SanberBook</h1>

    <h2>Social Media Developer Santai Berkualitas</h2>
    <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>

    <h3>Benefit Join di SanberBook</h3>
    <ul>
      <li>Mendapatkan motivasi dari sesama developer</li>
      <li>Sharing knowledge dari para mastah Sanber</li>
      <li>Dibuat oleh calon web developer terbaik</li>
    </ul>

    <h3>Cara Bergabung ke SanberBook</h3>
    <ol>
      <li>Mengunjungi Website ini</li>
      <li>Mendaftar di <a href="/register">Form Sign Up</a></li>
      <li>Selesai!</li>
    </ol>
@endsection

