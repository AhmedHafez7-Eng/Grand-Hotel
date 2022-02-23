<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <img src="{{ asset('assets/img/bg-doctor.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Life-Care</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/user/profile" class="d-block">
                    @if (Route::has('login'))
                        @auth
                            {{ Auth::user()->name }}
                        @endauth
                    @endif
                </a>
            </div>
        </div>

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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/manager" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Dashboard
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/showReceptionists" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Receptionists
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('add_doctor') }}" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Rooms
                           
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/showFloors" class="nav-link">
                        <i class="nav-icon fas fa-calendar-minus"></i>
                        <p>
                            Floors
                        </p>
                    </a>
                </li>
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
