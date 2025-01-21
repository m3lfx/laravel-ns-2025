<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listener;
use Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->fname . " " . $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $listener = new Listener();
        $listener->fname = $request->fname;
        $listener->lname = $request->lname;
        $listener->address = $request->address;
        $listener->img_path = $request->img_path;
        $listener->user_id = $user->id;
        $listener->save();
        dd($user, $listener);
    }
}
