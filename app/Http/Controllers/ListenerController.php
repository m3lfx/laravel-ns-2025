<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listener;
use App\Models\Album;
use DB;

class ListenerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeners = Listener::withTrashed()->get();
        // $listeners = DB::table('users AS u')
        //     ->join('listeners AS l', 'u.id', '=', 'l.user_id')
        //     ->orderBy('l.lname')
        //     ->select('l.id', 'l.fname', 'l.lname', 'u.email', 'l.address', 'img_path')
        //     ->get();
        // dd($listeners);
        return view('listener.index', compact('listeners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listener = Listener::find($id);

        dd($listener);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Listener::destroy($id);
        return redirect()->route('listeners.index');
    }

    public function restore($id) {
        $listener = Listener::withTrashed()->find($id)->restore();
        // dd($listener);
        // $listener->restore();
        
        return redirect()->route('listeners.index');
    }

    public function addAlbums()
    {
        // $albums = Album::all();
        $albums = DB::table('albums')
                ->join('artists', 'artists.id', '=', 'albums.artist_id')
                ->get(['name', 'albums.id', 'title', 'genre', 'date_released']);
        // dd($albums);
        
        return view('listener.add_album', compact('albums'));
    }

    public function addAlbumListener(Request $request)
    {
        // dd($request);
        $listener_id = 1;
        foreach($request->album_id as $album_id) {
            // dump($album_id);
            DB::table('album_listener')->insert([
                'album_id' => $album_id,
                'listener_id' => $listener_id,
                'created_at' => now()
            ]);

        }
        // return redirect()->route('listeners.index');
    }
}
