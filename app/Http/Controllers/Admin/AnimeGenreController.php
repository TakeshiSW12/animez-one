<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\AnimeGenre;

class AnimeGenreController extends Controller
{
    public function index() {
        $anime_genres = AnimeGenre::all();

        return view('anime_genres.index', compact('anime_genres'));
    }

    public function create() {
        return view('anime_genres.create');
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $anime_genre = AnimeGenre::create([
            'name' => request('name'),
        ]);

        return redirect()->route('anime_genre.index')
                         ->with('message', 'anime genre registered successfully');
    }
}
