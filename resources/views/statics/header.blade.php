<nav class="navbar navbar-expand-lg justify-content-center mx-5">
    <a class="navbar-brand text-center" href="{{ route('index.story') }}">
        <h1>ssbymouta</h1>
        <h5>Short-Stories by mouta</h3>
    </a>

    @guest
        <div class="d-flex m-3">
            <a href="{{ route('user.login') }}" class="btn btn-dark mx-1">Login</a>
            <a href="{{ route('user.register') }}" class="btn btn-dark mx-1">Register</a>
        </div>
    @endguest

    @auth
        <div class="d-flex">
            <a href="{{ route('user.profile', ['id' => Auth::user()->id]) }}" class="my-auto m-5">
                {{ Auth::user()->username }}
                @if (Auth::user()->is_admin)
                    <span class="badge text-bg-danger p-2">Admin</span>
                @else
                    <span class="badge text-bg-primary p-2">Author</span>
                @endif
            </a>
            
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-dark">Logout</button>
            </form>
        </div>
    @endauth
</nav>