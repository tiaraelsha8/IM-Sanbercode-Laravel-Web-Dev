@extends('layouts.master')

@section('tittle')
    Tampil Buku
@endsection

@section('content')
@auth
@if (Auth()->user()->role === 'admin')
     <a href="/book/create" class="btn btn-primary my-3">Tambah</a>
@endif
       
@endauth


    <div class="row d-flex flex-wrap align-items-stretch">
        @forelse ($books as $item)
            <div class="col-4 d-flex">
                <div class="card h-100 w-100" style="width: 18rem;">
                    <img src="{{asset('uploads/'.$item->image)}}" class="card-img-top" height="300px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->tittle}}</h5>
                        <span class="badge bg-success">{{$item->genre->name}}</span>
                        <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                        <h6 class="card-title">Stok : {{$item->stok}}</h6>
                        <div class="d-grid gap-2">     
                            <a href="/book/{{$item->id}}" class="btn btn-info">Read More</a>
                        </div>
                       @auth
                       @if (Auth()->user()->role === 'admin')
                        <div class="row mt-3">
                            <div class="col">
                                <div class="d-grid gap-2"> 
                                    <a href="/book/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                </div>
                            </div>
                            <div class="col">
                                <form action="/book/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-grid gap-2">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>

            </div>
        @empty
            <h1>Belum ada Buku</h1>
        @endforelse
    </div>
@endsection
