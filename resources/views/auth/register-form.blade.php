@extends('welcome')

@section('register-form')

<div class="d-flex justify-content-center align-content-center text-center m-5">
    <div class="card shadow-sm">
        <h4 class="m-2">Register account</h4>
        <hr class="m-0">

        <div class="card-body">
            <form action="{{ route('user.post-register') }}" method="POST">
                @csrf

                <label for="fullName">Fullname</label>
                <input type="text" name="fullname" id="fullName" class="form-control text-center" required>
                <p class="form-text">Enter your fullname: First and Last</p>

                <label for="userName">Username</label>
                <input type="text" name="username" id="userName" class="form-control text-center" required>
                <p class="form-text">Enter your dispaly name: firstandlast (example)</p>

                @error('username')
                    <div class="alert alert-danger small">
                        <i class="bi bi-info-circle"></i>
                        {{ $message }}
                    </div>
                @enderror

                <label for="eMail">E-Mail</label>
                <input type="email" name="email" id="eMail" class="form-control text-center" required>
                <p class="form-text">Enter your email address: firstandlast@gmail.com (example)</p>

                @error('email')
                    <div class="alert alert-danger small">
                        <i class="bi bi-info-circle"></i>
                        {{ $message }}
                    </div>
                @enderror

                <label for="passWord">Password</label>
                <input type="password" name="password" id="passWord" class="form-control text-center" required>
                <p class="form-text">Enter your secret password (8-16 characters)</p>

                <label for="passWordConf">Confirm Password</label>
                <input type="password" name="password_confirmation" id="passWordConf" class="form-control text-center" required>
                <p class="form-text">Enter your secret password again</p>

                <button type="submit" class="btn btn-outline-dark w-100">Register</button>
            </form>
        </div>
    </div>
</div>

@endsection