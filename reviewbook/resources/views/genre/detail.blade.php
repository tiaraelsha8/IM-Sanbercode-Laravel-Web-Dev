@extends('layouts.master')

@section('tittle')
    Detail Genre
@endsection

@section('content')
    
    <h1>{{$genres->name}}</h1>
    <p>{{$genres->description}}</p>

    <hr>

    <div class="row">
    @forelse ($genres ->Books as $item)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('uploads/'.$item->image)}}" class="card-img-top" height="300px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->tittle}}</h5>
                        <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                        <h6 class="card-title">Stok : {{$item->stok}}</h6>
                        <div class="d-grid gap-2">     
                            <a href="/book/{{$item->id}}" class="btn btn-info">Read More</a>
                        </div>
                      
                    </div>
                </div>

            </div>
    @empty
     <h1>Tidak ada Buku di Genre ini</h1>
    @endforelse
    </div>   

    <a href="/genre" class="btn btn-secondary btn-sm my-3">Kembali</a>

@endsection

