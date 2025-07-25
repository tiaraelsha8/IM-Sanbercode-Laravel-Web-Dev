@extends('layouts.master')

@section('tittle')
    Detail Buku
@endsection

@section('content')
    <img src="{{ asset('uploads/' . $books->image) }}" width="100%" height="500px" alt="">
    <h1 class="text-summary">{{ $books->tittle }}</h1>
    <p>{{ $books->summary }}</p>

    <hr>   
    <h1>List Komentar</h1>
    @forelse ($books->comments as $item)
     
        <div class="card my-3">
            <div class="card-header">
                {{$item->owner->name}}
            </div>
            <div class="card-body">
                <p class="card-text">{{$item->content}}</p>
            </div>
        </div>
    @empty
    <h3>Tida Ada Komentar</h3>
    @endforelse

    <hr>
    
    @auth
    <h3>Buat Komentar</h3>
        <form method="POST" action="/comments/{{ $books->id }}" enctype="multipart/form-data">
            @csrf

            {{-- validation --}}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif


            <div class="mb-3">
                <textarea name="content" class="form-control" placeholder="isi komentar" id="" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Buat Komentar</button>
        </form>

    @endauth
@endsection
