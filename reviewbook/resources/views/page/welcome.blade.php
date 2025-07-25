@extends('layouts.master')

@section('tittle')
    Dashboard
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
          {{ session('success') }}
    </div>
    
@endif

    <h1>SELAMAT DATANG {{$firstname}} {{$lastname}}</h1>
    <h2>
      Terima kasih telah bergabung di SanberBook. Social Media kita bersama!
    </h2>
@endsection

