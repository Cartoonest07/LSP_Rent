<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Rumah Musik</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('homepage') }}">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Rental Now</a>
            </li>
            <li class="nav-item dropdown" style>
                @auth
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        @if(auth()->user()->role == 'admin')
                            <a class="dropdown-item" href="{{ route('showDashboard') }}">Dashboard</a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item" href="{{ route('showProfileForm') }}">Lihat Profile</a>
                        <a id="button-logout" class="dropdown-item btn btn-danger" style="border-color: #D4E9F7;" onclick="document.getElementById('logoutForm').submit();">Logout</a>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                        @csrf
                </form>
                    </div>
                @else
                    <a class="nav-link" href="#">Login</a>
                @endauth
            </li>
        </ul>
    </div>
</nav>