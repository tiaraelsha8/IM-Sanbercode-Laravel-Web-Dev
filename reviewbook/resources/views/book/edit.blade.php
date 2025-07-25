@extends('layouts.master')

@section('tittle')
    Edit Buku
@endsection

@section('content')

    <form method="POST" action="/book/{{$books->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
            <label class="form-label">Genre</label>
            <select name="genre_id" id="" class="form-control">
                <option value="">--- Pilih Genre ---</option>
                @forelse ($genres as $item)
                    @if ($item->id === $books->genre_id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @empty
                    <option value="">Genre Belum Ada</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tittle</label>
            <input type="text" class="form-control" value="{{$books->tittle}}" name="tittle">
        </div>
        <div class="mb-3">
            <label class="form-label">Summary</label>
            <textarea name="summary" class="form-control" id="" cols="30" rows="10">{{$books->summary}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="stok" class="form-control" value="{{$books->stok}}" name="stok">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
