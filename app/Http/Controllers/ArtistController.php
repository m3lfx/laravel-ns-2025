<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index() {
        
    }

    public function edit($id) {
        
    }

    public function store() {
        $artist = new Artist();
        $artist->name = 'mike hanopol';
        $artist->country = 'philippines';
        $artist->img_path = "mike_photo.jpg";
        $artist->save();

    }
}
