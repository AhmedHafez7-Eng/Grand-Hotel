@include('manager.links')
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

    @include('manager.header')

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
    </div>
    @endif

    @include('manager.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rooms</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Rooms</li>
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
                                <h3 class="card-title">All receptionists</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>capacity</th>
                                            <th>price</th>
                                            <th>Floor Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                        <tr>
                                            <td>{{ $room->number }}</td>
                                            <td>{{ $room-> capacity }}</td>
                                            <td>{{ $room-> price/100 }}$</td>
                                            <td>{{$room->RelatedFloor->name}}</td>
                                            <td>
                                            @if($room->creator_id==Auth::user()->id)
                                                <a class="btn btn-danger" href="/deleteRoom/{{$room -> number}}">Delete
                                                </a>
                                                <a class="btn btn-warning" href="/updateRoom/{{$room ->number}}">Update
                                                </a>
                                            @endif    
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <a class="btn btn-primary" href="/createRoom">Add new Room</a>

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

@include('manager.scripts')