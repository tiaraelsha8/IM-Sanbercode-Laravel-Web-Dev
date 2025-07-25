@extends('layouts.master')

@section('tittle')
    Tambah Buku
@endsection

@section('content')

    <form method="POST" action="/book" enctype="multipart/form-data">
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
            <label class="form-label">Genre</label>
            <select name="genre_id" id="" class="form-control">
                <option value="">--- Pilih Genre ---</option>
                @forelse ($genres as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                 @empty
                <option value="">Genre Belum Ada</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tittle</label>
            <input type="text" class="form-control" name="tittle">
        </div>
        <div class="mb-3">
            <label class="form-label">Summary</label>
            <textarea name="summary" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="stok" class="form-control" name="stok">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
