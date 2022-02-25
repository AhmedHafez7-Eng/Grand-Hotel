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

    #NameHelpInline {
        color: rgb(255, 53, 53);
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
                        <h1>Floors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Floors</li>
                        </ol>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <form action="show_floors" method="POST" autocomplete="off" class="addFloor">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Add New Floor</label>
                                <input type="text" class="form-control col-3" id="name" name="name"
                                    aria-describedby="nameHelp" value="{{ old('name') }}"
                                    placeholder="Enter Floor Name">
                                @error('name')
                                    <div class="col-auto">
                                        <span id="NameHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Floor</button>
                            </div>
                        </form>
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
                                <h3 class="card-title">All Floors</h3>
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
                                            <th>Edit</th>
                                            <th>Delete</th>
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
                                                <td>
                                                    <form action="{{ url('update_floor', $floor->number) }}"
                                                        method="GET">
                                                        @csrf
                                                        @if ($floor->creator_id == Auth::user()->id)
                                                            <button type="submit"
                                                                class="btn btn-outline-info">Edit</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ url('delete_floor', $floor->number) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        @if ($floor->creator_id == Auth::user()->id)
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm('Are You Sure To Delete this Floor?')">Delete</button>
                                                        @endif
                                                    </form>
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
                                            <th>Edit</th>
                                            <th>Delete</th>
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
