@include('admin.links')
<style>
    .dt-buttons,
    .btn-group,
    .flex-wrap {
        gap: 10px;
    }

</style>
<div class="wrapper">

    @include('admin.header')

    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        {{-- =============================== Managers --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Managers</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                            <li class="breadcrumb-item "></li>
                        </ol>
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
                                <h3 class="card-title">Managers</h3>
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
                                            <th>Creator Role</th>
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
                                                    {{ $manager->Creator()->name }}
                                                </td>
                                                <td>
                                                    {{ $manager->Creator()->role }}
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
                                            <th>Creator Role</th>
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

        {{-- =============================== Receptionists --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Receptionists</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                            <li class="breadcrumb-item "></li>
                        </ol>
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
                                <h3 class="card-title">Receptionists</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Receptionists Name</th>
                                            <th>Email</th>
                                            <th>National ID</th>
                                            <th>Profile Image</th>
                                            <th>Country</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Creator Name</th>
                                            <th>Creator Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($receps as $recep)
                                            <tr>
                                                <td>{{ $recep->name }}</td>
                                                <td>{{ $recep->email }}</td>
                                                <td>{{ $recep->national_ID }}</td>
                                                <td>
                                                    <img width="100" height="100"
                                                        src="usersImages/{{ $recep->avatar_Img }}"
                                                        alt="Receptionist Image">
                                                </td>
                                                <td>{{ $recep->country }}</td>
                                                <td>{{ $recep->gender }}</td>
                                                <td>{{ $recep->status }}</td>
                                                <td>
                                                    {{ $recep->Creator()->name }}
                                                </td>
                                                <td>
                                                    {{ $recep->Creator()->role }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Receptionists Name</th>
                                            <th>Email</th>
                                            <th>National ID</th>
                                            <th>Profile Image</th>
                                            <th>Country</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Creator Name</th>
                                            <th>Creator Role</th>
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

        {{-- =============================== Floors --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Floors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                            <li class="breadcrumb-item "></li>
                        </ol>
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
                                <h3 class="card-title">Floors</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Floor Number</th>
                                            <th>Floor Name</th>
                                            <th>Creator Name</th>
                                            <th>Creator Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($floors as $floor)
                                            <tr>
                                                <td>{{ $floor->number }}</td>
                                                <td>{{ $floor->name }}</td>
                                                <td>
                                                    {{ $floor->floorCreator->name }}
                                                </td>
                                                <td>
                                                    {{ $floor->floorCreator->role }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Floor Number</th>
                                            <th>Floor Name</th>
                                            <th>Creator Name</th>
                                            <th>Creator Role</th>
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

        {{-- =============================== Rooms --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rooms</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                            <li class="breadcrumb-item "></li>
                        </ol>
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
                                <h3 class="card-title">Rooms</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Room Number</th>
                                            <th>Capacity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Floor Number</th>
                                            <th>Creator Name</th>
                                            <th>Creator Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <td>{{ $room->number }}</td>
                                                <td>{{ $room->capacity }}</td>
                                                <td>{{ $room->price }}</td>
                                                <td>{{ $room->status }}</td>
                                                <td>
                                                    {{ $room->floor_number }}
                                                </td>
                                                <td>
                                                    {{ $room->RoomCreator->name }}
                                                </td>
                                                <td>
                                                    {{ $room->RoomCreator->role }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Room Number</th>
                                            <th>Capacity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Floor Number</th>
                                            <th>Creator Name</th>
                                            <th>Creator Role</th>
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
    </div>

    @include('layouts.footer')

</div>
<!-- ./wrapper -->

@include('admin.scripts')
