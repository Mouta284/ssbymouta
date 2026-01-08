@extends('welcome')

@section('story-content')
    <div class="text-center container my-2">
        <a href="{{ route('index.story') }}" class="btn btn-outline-dark rounded-pill mb-3">
            <span class="bi bi-bookmark-fill"> Collection</span>
        </a>
        <header class="card-header m-2">
            <h1>{{$story->title}}</h1>
            <h2>{{ $story->subtitle }}</h2>
            <p class="opacity-50">by {{ $story->author->username }}</p>
        </header>

        <p class=" mx-lg-5 p-4 text-body text-start" style="white-space: pre-line">{{ $story->content }}</p>
    </div>
@endsection