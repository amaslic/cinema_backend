<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{

    public function index()
    {
        //
        return response()->json(['movies' => Movie::where('active', 1)->get()], 200);
    }

    public function store(Request $request)
    {

        Movie::create($request->all());

        return response()->json(['message' => 'Movie created'], 200);
    }

    public function show($id)
    {
        //
        return response()->json(['movie' => Movie::find($id)], 200);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
