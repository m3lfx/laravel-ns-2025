@extends('layouts.base')

@section('body')
    @include('layouts.header')
    <p>total {{$total}}</p>
    <div class="container-lg">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div class=" d-flex align-items-center justify-content-center">
    <div>{{$results->links()}}</div>
@endsection
