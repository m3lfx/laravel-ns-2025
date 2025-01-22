<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listener;
use Hash;
use Storage;
use Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // dd(uniqid($request->file('img_path')).".".$request->file('img_path')->getClientOriginalExtension());
        // $path = Storage::putFileAs(
        //     '/images', $request->file('img_path'), $request->file('img_path')->getClientOriginalName()
        // );
        // dd($path);

        $path = Storage::putFileAs(
            'public/images', $request->file('img_path'), $request->file('img_path')->hashName()
        );
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
        // dd($user, $listener);
        Auth::login($user);
        return redirect()->route('user.profile');
    }
    public function profile() {
        // dd(Auth::user()->id);
        $user = Auth::user();
        $listener = Listener::where('user_id', $user->id)->first();
        // dd($listener);
        return view('user.profile', compact('user', 'listener'));
    }
}
