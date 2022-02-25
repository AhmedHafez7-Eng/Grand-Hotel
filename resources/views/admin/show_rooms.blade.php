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

    #CapacityHelpInline,
    #PriceHelpInline,
    #floor_numHelpInline {
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
                        <h1>Rooms</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Rooms</li>
                        </ol>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <h1>Add New Room</h1><br>
                        <form action="show_rooms" method="POST" autocomplete="off" class="addRoom">
                            @csrf
                            <div class="mb-3 col-12">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control col-3" id="capacity" name="capacity"
                                    aria-describedby="capacityHelp" value="{{ old('capacity') }}"
                                    placeholder="Enter Room Capacity">
                                @error('capacity')
                                    <div class="col-auto">
                                        <span id="CapacityHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control col-3" id="price" name="price"
                                    aria-describedby="capacityHelp" value="{{ old('price') }}"
                                    placeholder="Enter Room Price">
                                @error('price')
                                    <div class="col-auto">
                                        <span id="PriceHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label for="floor_num" class="form-label">Floor Number</label>
                                <select name="floor_num" id="floor_num" class="custom-select">
                                    <option value="-1">--Select--</option>
                                    @foreach ($floors as $floor)
                                        <option value="{{ $floor->number }}"
                                            {{ old('floor_num') == $floor->number ? 'selected' : '' }}>
                                            {{ $floor->number }} -
                                            {{ $floor->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('floor_num')
                                    <div class="col-auto">
                                        <span id="floor_numHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <button type="submit" class="btn btn-primary">Add Room</button>
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
                                <h3 class="card-title">All Room</h3>
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
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <td>{{ $room->number }}</td>
                                                <td>{{ $room->capacity }}</td>
                                                <td>${{ $room->price }}</td>
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
                                                <td>
                                                    <form action="{{ url('update_room', $room->number) }}"
                                                        method="GET">
                                                        @csrf
                                                        @if ($room->creator_id == Auth::user()->id)
                                                            <button type="submit"
                                                                class="btn btn-outline-info">Edit</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ url('delete_room', $room->number) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        @if ($room->creator_id == Auth::user()->id)
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm('Are You Sure To Delete this Room?')">Delete</button>
                                                        @endif
                                                    </form>
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
