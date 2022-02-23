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
                        <h1>Manager Panel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Receptionists</li>
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
                                <h3 class="card-title">Update Floor</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            
                                <form method="GET" action="{{route('floor.update')}}">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text "> Name</span>
                                    </div>
                                    <input class="form-control mb-3" type="text" name="name">
                                    @if($errors->get('name'))
                                    <span class="bg-danger py-2 px-5 ">@error('name'){{$message}}@enderror</span>
                                    @endif
                                    <div class="input-group mt-3">
                                        <span class="input-group-text "> Number</span>
                                    </div>
                                    <input class="form-control mb-3 " type="text" name="number">
                                    @if($errors->get('number'))
                                    <span class="bg-danger py-2 px-5 ">@error('number'){{$message}}@enderror</span>
                                    @endif
                                    <div>
                                        <input class="btn btn-primary mt-3" type="submit" value="Save updates">
                                    </div>

                                </form>




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