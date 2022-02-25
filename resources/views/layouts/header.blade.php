<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <a href="https://wa.me/+201010495597"><span class="mai-call text-primary"></span> +20 101 049
                            5597</a>
                        <span class="divider">|</span>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ahmedhafezoffic@gmail.com"><span
                                class="mai-mail text-primary"></span> ahmedhafezoffic@.com</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="https://www.facebook.com/profile.php?id=100005116839262"><span
                                class="mai-logo-facebook-f"></span></a>
                        <a href="https://www.linkedin.com/in/ahmedhafez247/"><span class="mai-logo-linkedin"></span></a>
                        <a href="https://github.com/AhmedHafez7-Eng"><span class="mai-logo-github"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><span class="text-primary">Life</span>-Care</a>

            <form action="#">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                        aria-describedby="icon-addon1">
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Home</a>

                        @if (Route::has('login'))
                        @auth
                        @if (Auth::user()->role == 'client')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('my_appointment') }}"
                            style="background-color: rgb(12, 184, 12); color:#FFF;">My
                            Appointments</a>
                    </li>
                    @elseif (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/show_doctors') }}">Manage Managers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/show_appointments') }}">Manage Receptionists</a>
                    </li>

                    @elseif (Auth::user()->role == 'manager')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/showReceptionists') }}">Manage Receptionists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/room') }}">Manage Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/showFloors') }}">Manage Floors</a>
                    </li>

                    @elseif (Auth::user()->role == 'receptionist')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/showReceptionists') }}">Manage Reservation</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/show_doctors') }}">Manage Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/show_appointments') }}">Approved Clients</a>
                    </li>
                    @endif
                    <x-app-layout>
                    </x-app-layout>

                    @else
                    <li class="nav-item">
                        <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                    </li>

                    @endauth
                    @endif
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>