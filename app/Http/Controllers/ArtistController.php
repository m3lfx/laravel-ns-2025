<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class ArtistController extends Controller
{
    public function index() {
        // $name = 'test';
        $data['name'] = 'blade template';
        return View::make('artist', $data);
    }
}
