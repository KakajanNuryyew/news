@extends('layouts.user')

@section('content')
    <div class="container new-page">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <img src="{{route('images.show', ['name' => $new->image])}}" alt="{{ $new->name }}" width="100%" height="160px">
                <h1>{{$new->name}}</h1>
                <h4>{{$new->author}}</h4>
                <hr />
                <p>{{$new->description}}</p>
                <p class="created-at">{{$new->created_at}}</p>

            </div>
        </div>

    </div>
@endsection

@section('js')
@endsection
