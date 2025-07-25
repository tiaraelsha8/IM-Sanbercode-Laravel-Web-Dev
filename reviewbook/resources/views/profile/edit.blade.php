@extends('layouts.master')

@section('tittle')
    Edit Profile
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
          {{ session('success') }}
    </div>
    
@endif

<form method="POST" action="/profile/{{$profile->id}}">
        @csrf
        @method("PUT")
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
            <label class="form-label">Age</label>
            <input type="number" class="form-control" value="{{$profile->age}}" name="age">
        </div>
        <div class="mb-3">
             <label class="form-label">Address</label>
            <textarea name="address" class="form-control" id="" cols="30" rows="10">{{$profile->address}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection