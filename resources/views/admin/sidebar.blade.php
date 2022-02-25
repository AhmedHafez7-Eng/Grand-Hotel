<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('assets/img/bg-doctor.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Grand-Hotel</span>
    </a>

    <!-- Sidebar -->
    
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if (\Auth::user()->role == "admin")
            <div class="image">
                {{-- <img src="../../admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                @if (Route::has('login'))
                    @auth
                        <img src="../../../usersImages/{{ Auth::user()->avatar_Img }}" class="img-circle elevation-2"
                            alt="User Image">
                    @endauth
                @endif
            </div>
            @endif
            <div class="info">
                {{-- <a href="/user/profile" class="d-block"> --}}
                <a href="{{ url('updateProfile', Auth::user()->id) }}" class="d-block">
                    @if (Route::has('login'))
                        @auth
                            {{ Auth::user()->name}}
                        @endauth
                    @endif
                </a>
            </div>
        </div>
        @if (\Auth::user()->role == "admin")

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        @endif


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Dasboard
                            {{-- <span class="right badge badge-success">Doctors</span> --}}
                        </p>
                    </a>
                </li>
                @if (\Auth::user()->role == "admin")
                <li class="nav-item">
                    <a href="{{ url('show_managers') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Manage Managers
                            {{-- <span class="right badge badge-success">Doctors</span> --}}
                        </p>
                    </a>
                </li>
<<<<<<< HEAD
                <li class="nav-item">
                    <a href="{{ url('show_receptionists') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
=======
                
                     <li class="nav-item">
                    <a href="{{ url('add_doctor') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
>>>>>>> edee0321cdeb5bcdbd59d67aaa5e974751193d28
                        <p>
                            Manage Receptionists
                            {{-- <span class="right badge badge-success">Doctors</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('show_floors') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Manage Floors
                            {{-- <span class="right badge badge-success">Doctors</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('show_rooms') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Manage Rooms
                            {{-- <span class="right badge badge-success">Doctors</span> --}}
                        </p>
                    </a>
                </li>   
             @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
