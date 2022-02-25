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

</style>
<div class="wrapper">

    @include('admin.header')

    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Appointments</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Appointments</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                 @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close">&times;</button>
                        </div>
                    @endif
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users Appointments</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Approving</th>
                                            <th>Canceling</th>
                                            <th>Send Mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment->email }}</td>
                                                <td>{{ $appointment->phone }}</td>
                                                <td>{{ $appointment->doctor }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->message }}</td>
                                                <td>{{ $appointment->status }}</td>
                                                <td>
                                                    <form action="{{ url('approved', $appointment->id) }}"
                                                        method="GET">
                                                        @if ($appointment->status == 'In-Progress')
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Approave</button>
                                                        @elseif ($appointment->status == 'Approved')
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Dis-Approave</button>
                                                        @else
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Approave</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ url('canceled', $appointment->id) }}"
                                                        method="GET">
                                                        @if ($appointment->status == 'Canceled')
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                disabled
                                                                onclick="return confirm('Are You Sure To Cancel this Appointment?')">Cancel</button>
                                                        @else
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm('Are You Sure To Cancel this Appointment?')">Cancel</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ url('emailNotify', $appointment->id) }}"
                                                        method="GET">
                                                            <button type="submit" class="btn btn-outline-primary">Send Mail</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Approving</th>
                                            <th>Canceling</th>
                                            <th>Send Mail</th>
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
