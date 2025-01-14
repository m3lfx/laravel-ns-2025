@extends('layouts.base')
@section('body')
    <div class="container-lg">
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Artist Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name">

            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Artist Country</label>
                <input type="text" class="form-control" id="country" aria-describedby="country">

            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Artist Image</label>
                <input type="text" class="form-control" id="image" aria-describedby="image">

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
