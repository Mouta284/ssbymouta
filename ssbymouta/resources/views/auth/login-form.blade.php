@extends('welcome')

@session('succes')

@endsession

@section('login-form')
    <div class="d-flex justify-content-center align-items-center text-center m-5">
        <div class="card shadow-sm">
            <h4 class="m-2">Login</h3>
            <hr class="m-0">

            <div class="card-body">
                <form action="{{ route('user.post-login') }}" method="POST">
                    @csrf
                    
                    <label for="userName" class="form-label">Username</label>
                    <input type="text" name="username" id="userName" class="text-center mb-2 form-control" required>
                    <p class="form-text">Write your username</p>

                    @error('username')
                        <div class="alert alert-danger small">
                            <i class="bi bi-info-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="passWord" class="form-label">Password</label>
                    <input type="password" name="password" id="passWord" class="text-center mb-2 form-control" required>

                    @error('password')
                        <div class="alert alert-danger small">
                            <i class="bi bi-info-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-outline-dark w-100 mt-3"> Login </button>
                </form>
            </div>
        </div>
    </div>
@endsection