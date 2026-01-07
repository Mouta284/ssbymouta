@extends('welcome')

@section('profile-content')

<div class="d-flex flex-column align-items-center justify-content-center">
    <div class="card shadow-sm m-5 p-5">
        <div class="card-title">
            <h1>Welcome, {{ $user->username }}!</h1>
        </div>
        <div class="card-body">
            <h3>Full Name: {{ $user->name}}</h3>
            <h3>Username: {{ $user->username }}</h3>
            <p>E-mail: {{ $user->email }}</p>
        </div>
    </div>

    <a href="{{ route('story.upload') }}" class="btn btn-dark">Upload your story</a>
</div>

@endsection