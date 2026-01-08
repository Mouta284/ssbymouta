@extends('welcome')

@section('story-cards')
<div class="container-fluid bg-light py-4">
    <div class="container">
        <h2 class="text-center mb-4">Collection</h2>
        <div class="d-flex text-center flex-wrap">
                @foreach ($stories as $story)
                <div class="card m-4 col-md-2 hover-card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $story->title }}</h4>
                        <p class="card-text text-muted">{{ $story->subtitle }}</p>
                        <a class="btn btn-dark w-100" href="{{ route('story.show', ['id' => $story->id]) }}">Read</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection