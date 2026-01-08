@extends('welcome')

@section('story-upload')

<div class="d-flex justify-content-center align-items-center m-5">
    <div class="card shadow-sm w-50">
        <h4 class="m-2 text-center">Story</h4>
        <hr class="m-0">

        <div class="card-body">
            <form action="{{ route('story.post-upload') }}" method="POST">
                @csrf
                
                <label for="mainTitle" class="m-1">Title</label>
                <input type="text" name="title" id="mainTitle" class="form-control" required>

                @error('title')
                    <div class="alert alert-danger small m-1">
                        <i class="bi bi-info-circle"></i>
                        {{ $message }}
                    </div> 
                @enderror

                <label for="subTitle" class="m-1">Subtitle</label>
                <input type="text" name="subtitle" id="subTitle" class="form-control" required>

                @error('subtitle')
                    <div class="alert alert-danger small m-1">
                        <i class="bi bi-info-circle"></i>
                        {{ $message }}
                    </div> 
                @enderror

                <label for="content" class="m-1">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Let your imagination flow..." rows="15" required></textarea>

                @error('content')
                    <div class="alert alert-danger small m-1">
                        <i class="bi bi-info-circle"></i>
                        {{ $message }}
                    </div> 
                @enderror

                <button type="submit" class="btn btn-outline-dark mt-3 w-100">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection