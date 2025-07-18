@extends('layouts.master')

@section('tittle')
    Tampil Genre
@endsection

@section('content')
    <a href="/genre/create" class="btn btn-primary btn-sm my-2">Tambah</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                        <form method="POST" action="/genre/{{$item->id}}">
                        <a href="/genre/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/genre/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>No users</tr>
            @endforelse

        </tbody>
    </table>
@endsection
