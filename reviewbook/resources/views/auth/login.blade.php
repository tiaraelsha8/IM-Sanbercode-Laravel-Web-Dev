@extends('layouts.master')

@section('tittle')
    Login
@endsection

@section('content')

<form method="POST" action="/login">
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
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
     
        <button type="submit" class="btn btn-primary">Login</button>
    </form>


@endsection