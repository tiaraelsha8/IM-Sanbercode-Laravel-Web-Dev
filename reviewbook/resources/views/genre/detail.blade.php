@extends('layouts.master')

@section('tittle')
    Detail Genre
@endsection

@section('content')
    
    <h1>{{$genres->name}}</h1>
    <p>{{$genres->description}}</p>

    <a href="/genre" class="btn btn-secondary btn-sm">Kembali</a>

@endsection

