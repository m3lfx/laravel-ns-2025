<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        dd($artists);
    }

    public function create()
    {
        return view('artist.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $artist = new Artist();
        $artist->name = trim($request->name);
        $artist->country = trim($request->country);
        $artist->img_path = trim($request->img_path);

        $artist->save();

        return "artist saved";
    }

    public function edit($id)
    {
        // dd($id);
        $artist = Artist::find($id);
        // $data['artist'] = $artist;
        // dd(compact('artist'));
        return view('artist.edit', compact('artist'));
    }

    public function update(Request $request, $id) {
        // dd($id, $request);
        $artist = Artist::find($id);
        $artist->name = trim($request->name);
        $artist->country = trim($request->country);
        $artist->img_path = trim($request->img_path);

        $artist->save();

        return "artist update";

    }

    public function delete($id) {
        // Artist::find($id)->delete();
        Artist::destroy([$id]);
        return "artist deleted";
    }
}
