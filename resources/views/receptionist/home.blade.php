@include('receptionist.links')
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
        background-color: #e7d63d;
        color: #FFF;
    }

</style>
<div class="wrapper">



    @include('receptionist.header')
    @include('receptionist.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Receptionist</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Reservation data</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session()->has('midError'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('midError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">&times;</button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Approved data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Name</th>
                                            <th>Accompany Number </th>
                                            <th>Room_Number</th>
                                            <th>Paid Price</th>
                                            <th>Client Id</th>
                                            <th>Status</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($approved as $approveds)
                                            <tr>
                                                <td>{{ $approveds->id }}</td>
                                                <td>{{ $approveds->client_name }}</td>
                                                <td>{{ $approveds->accompany_number }}</td>
                                                <td>{{ $approveds->room_number }}</td>
                                                <td>{{ $approveds->paid_price }}</td>
                                                <td>{{ $approveds->client_id }}</td>
                                                <td>{{ $approveds->status }}</td>
                                                <td>
                                                    <form action="{{ route('change', ['id' => $approveds->id]) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button name="approve" type="submit"
                                                            class="btn btn-outline-info">Non Approve</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Nonapproved data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Name</th>
                                            <th>Accompany Number </th>
                                            <th>Room_Number</th>
                                            <th>Paid Price</th>
                                            <th>Client Id</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nonapproved as $approveds)
                                            <tr>
                                                <td>{{ $approveds->id }}</td>
                                                <td>{{ $approveds->client_name }}</td>
                                                <td>{{ $approveds->accompany_number }}</td>
                                                <td>{{ $approveds->room_number }}</td>
                                                <td>{{ $approveds->paid_price }}</td>
                                                <td>{{ $approveds->client_id }}</td>
                                                <td>{{ $approveds->status }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All In Progress data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client Name</th>
                                            <th>Accompany Number </th>
                                            <th>Room_Number</th>
                                            <th>Paid Price</th>
                                            <th>Client Id</th>
                                            <th>Status</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inprogress as $approveds)
                                            <tr>
                                                <td>{{ $approveds->id }}</td>
                                                <td>{{ $approveds->client_name }}</td>
                                                <td>{{ $approveds->accompany_number }}</td>
                                                <td>{{ $approveds->room_number }}</td>
                                                <td>{{ $approveds->paid_price }}</td>
                                                <td>{{ $approveds->client_id }}</td>
                                                <td>{{ $approveds->status }}</td>
                                                <td>
                                                    <form action="{{ route('change', ['id' => $approveds->id]) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button type="submit" name="non"
                                                            class="btn btn-outline-info">Non Approve</button>
                                                        <button type="submit" name="app"
                                                            class="btn btn-outline-info">Approve</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
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


</div>
<!-- ./wrapper -->

@include('receptionist.scripts')
