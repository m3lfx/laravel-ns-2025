<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listener;
use Hash;
use Storage;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // dd(uniqid($request->file('img_path')).".".$request->file('img_path')->getClientOriginalExtension());
        $path = Storage::putFileAs(
            '/images', $request->file('img_path'), $request->file('img_path')->getClientOriginalName()
        );
        // dd($path);
        $user = new User();
        $user->name = $request->fname . " " . $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

       
        
        $listener = new Listener();
        $listener->fname = $request->fname;
        $listener->lname = $request->lname;
        $listener->address = $request->address;
        $listener->img_path = $path;
        $listener->user_id = $user->id;
        $listener->save();
        dd($user, $listener);
    }
}
