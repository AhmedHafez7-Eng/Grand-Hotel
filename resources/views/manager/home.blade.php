@include('manager.links')
<style>
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
        background-color: #d9e62f;
        color: #FFF;
    }

</style>
<div class="wrapper">

    @include('manager.header')

    @include('manager.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
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
                                <h3 class="card-title">Latest Receptionists</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Created Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($receptionist as $rece)
                                            <tr>
                                                <td>{{ $rece->name }}</td>
                                                <td>{{ $rece->email }}</td>
                                                <td>{{ $rece->created_at }}</td>



                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Created Date</th>

                                        </tr>
                                    </tfoot>
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

    <!-- Content Wrapper. Contains page content -->


</div>
<!-- /.content-wrapper -->

@include('layouts.footer')

</div>
<!-- ./wrapper -->

@include('manager.scripts')
