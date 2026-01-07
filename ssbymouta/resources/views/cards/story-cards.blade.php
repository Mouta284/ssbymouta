@extends('welcome')

@section('story-cards')
    <div class="d-flex text-center justify-content-center">
        @foreach ($stories as $story)
            <div class="card m-4 col-md-2">
                <div class="card-body">
                    <h4 class="card-title">{{ $story->title }}</h4>
                    <p class="card-text">{{ $story->subtitle }}</p>
                    <a class="btn btn-dark w-100" href="{{ route('show.story', ['id' => $story->id]) }}">Read</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection