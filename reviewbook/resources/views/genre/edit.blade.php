@extends('layouts.master')

@section('tittle')
    Edit Genre
@endsection

@section('content')

    <form method="POST" action="/genre/{{$genres->id}}">
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
            <label class="form-label">Nama Genre</label>
            <input type="text" class="form-control" name="name" value="{{$genres->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$genres->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
