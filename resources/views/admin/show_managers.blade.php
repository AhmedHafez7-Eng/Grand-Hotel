@include('admin.links')
<style>
    /* button {
        background-color: rgb(123, 255, 0) !important;
    } */

    .dt-buttons,
    .btn-group,
    .flex-wrap {
        gap: 10px;
    }

    .alert {
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        width: 500px;
        padding: 20px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .alert button {
        padding: 3px 15px;
        font-size: 22px;
        border-radius: 17%;
        transition: .3s ease !important;

    }

    .alert button:hover {
        background-color: #50855C;
        color: #FFF;
    }

</style>
<div class="wrapper">

    @include('admin.header')

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
        </div>
    @endif

    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Managers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Managers</li>
                        </ol>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <a href="{{ url('add_manager') }}" class="btn btn-primary">Add Manager</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Managers</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Manager Name</th>
                                            <th>Email</th>
                                            <th>National ID</th>
                                            <th>Profile Image</th>
                                            <th>Country</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Creator Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Ban/UnBan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($managers as $manager)
                                            <tr>
                                                <td>{{ $manager->name }}</td>
                                                <td>{{ $manager->email }}</td>
                                                <td>{{ $manager->national_ID }}</td>
                                                <td>
                                                    <img width="100" height="100"
                                                        src="usersImages/{{ $manager->avatar_Img }}"
                                                        alt="Manager Image">
                                                </td>
                                                <td>{{ $manager->country }}</td>
                                                <td>{{ $manager->gender }}</td>
                                                <td>{{ $manager->status }}</td>
                                                <td>
                                                    {{ $manager->ManagerCreator()->name }}
                                                </td>
                                                <td>
                                                    <form action="{{ url('updateManager', $manager->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        @if ($manager->creator_id == Auth::user()->id)
                                                            <button type="submit"
                                                                class="btn btn-outline-info">Edit</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ url('deleteManager', $manager->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        @if ($manager->creator_id == Auth::user()->id)
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm('Are You Sure To Delete this Doctor?')">Delete</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ url('banned', $manager->id) }}" method="GET">
                                                        @if ($manager->creator_id == Auth::user()->id)
                                                            @if ($manager->status == 'unBanned')
                                                                <button type="submit"
                                                                    class="btn btn-outline-success">Ban</button>
                                                            @else
                                                                <button type="submit"
                                                                    class="btn btn-outline-success">UnBan</button>
                                                            @endif
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Manager Name</th>
                                            <th>Email</th>
                                            <th>National ID</th>
                                            <th>Profile Image</th>
                                            <th>Country</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Creator Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Ban/UnBan</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{-- {!! $doctors->links() !!} --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')

</div>
<!-- ./wrapper -->

@include('admin.scripts')
