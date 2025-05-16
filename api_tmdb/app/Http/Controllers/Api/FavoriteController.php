<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $query = Favorite::query();

        if ($request->has('genre_id')) {
            $genreId = $request->input('genre_id');
            $query->whereRaw("FIND_IN_SET(?, genre_ids)", [$genreId]);
        }

        $favorites = $query->get();

        return response()->json([
            'data' => $favorites,
        ]);
    }

    public function store(Request $request)
    {
        $favorite = new Favorite();

        $favorite->adult = $request->adult;
        $favorite->backdrop_path = $request->backdrop_path;
        $favorite->genre_ids = collect($request->genre_ids)->implode(',');
        $favorite->movie_id = $request->id;
        $favorite->original_language = $request->original_language;
        $favorite->original_title = $request->original_title;
        $favorite->overview = $request->overview;
        $favorite->popularity = $request->popularity;
        $favorite->poster_path = $request->poster_path;
        $favorite->release_date = $request->release_date;
        $favorite->title = $request->title;
        $favorite->video = $request->video;
        $favorite->vote_average = $request->vote_average;
        $favorite->vote_count = $request->vote_count;

        $favorite->save();

        return response()->json([
            'message' => 'Filme favoritado com sucesso!',
            'data'    => $favorite
        ]);
    }

    public function destroy(string $id)
    {
        $favorite = Favorite::where('movie_id', $id)->first();

        if ($favorite) {
            $favorite->delete();

            return response()->json([
                'message' => 'Filme removido dos favoritos com sucesso!'
            ]);
        }

        return response()->json([
            'message' => 'Filme não encontrado!'
        ], 404);
    }
}
