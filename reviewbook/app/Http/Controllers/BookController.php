<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;


class BookController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
                new Middleware(IsAdmin::class, except: ['index', 'show'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.tampil', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('book.tambah', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'tittle' => 'required',
            'summary' => 'required',
            'stok' => 'required',
            'genre_id' => 'required',
        ]);

        $newImageName = time() . '.' . $request->file('image')->extension();

        $request->file('image')->move(public_path('uploads'), $newImageName);

        $books = new Book();

        $books->tittle = $request->input('tittle');
        $books->summary = $request->input('summary');
        $books->stok = $request->input('stok');
        $books->genre_id = $request->input('genre_id');
        $books->image = $newImageName;

        $books->save();

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);

        return view('book.detail', ['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genre::all();
        $books = Book::find($id);

        return view('book.edit', ['books' => $books, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:2048',
            'tittle' => 'required',
            'summary' => 'required',
            'stok' => 'required',
            'genre_id' => 'required',
        ]);
        $books = Book::find($id);

        if ($request->has('image')) {
            // hapus data lama
            File::delete('uploads/' . $books->image);

            $newImageName = time() . '.' . $request->file('image')->extension();

            $request->file('image')->move(public_path('uploads'), $newImageName);

            $books->image = $newImageName;
        }

        $books->tittle = $request->input('tittle');
        $books->summary = $request->input('summary');
        $books->stok = $request->input('stok');
        $books->genre_id = $request->input('genre_id');

        $books->save();

        return redirect('/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::find($id);
        File::delete('uploads/' . $books->image);

        $books->delete();

        return redirect('/book');
    }

 
}
