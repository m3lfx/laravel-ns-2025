@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('listeners.updateAlbums') }}" method="POST">

            @foreach ($albums as $album)
                @if (in_array($album->id, $myAlbums))
                    <li> 
                        <label>
                            {{ $album->name }}
                            <input type="checkbox" id="album" name="album_id[]" value={{ $album->id }} checked />
                        </label>


                    </li>
                @else
                <li> 
                    <label>
                        {{ $album->name }}
                        <input type="checkbox" id="album" name="album_id[]" value={{ $album->id }}/>
                    </label>


                </li>
                @endif
            @endforeach

            {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
    </div>
@endsection
