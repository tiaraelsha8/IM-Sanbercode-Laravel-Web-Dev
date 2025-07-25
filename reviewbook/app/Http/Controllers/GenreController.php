<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create()
    {
        return view('genre.tambah');
    }

    public function store(Request $request)
    {
        // validation
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
        ]);

        // insert data
        DB::table('genres')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/genre');
    }

    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('genre.tampil', ['genres' => $genres]);
    }

    public function show($id)
    {
        $genres = Genre::find($id);

        return view('genre.detail', ['genres' => $genres]);
    }

    public function edit($id)
    {
        $genres = DB::table('genres')->find($id);

        return view('genre.edit', ['genres' => $genres]);
    }

    public function update($id, Request $request)
    {
        // validation
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
        ]);

        DB::table('genres')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'created_at' => Carbon::now(),
                ]
            );

            return redirect('/genre');
    }

    public function destroy($id)
    {
        $deleted = DB::table('genres')->where('id', $id)->delete();

        return redirect('/genre');
    }
}
