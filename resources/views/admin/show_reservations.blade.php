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
                        <h1>Reservations</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Reservations</li>
                        </ol>
                    </div>
                    <div class="col-sm-12 mt-4">
                        <h1>Reserve A Room</h1><br>
                        <form action="show_reservations" method="POST" autocomplete="off" class="addRoom">
                            @csrf
                            <div class="mb-3 col-12">
                                <label for="name" class="form-label">Client Name</label>
                                <input type="text" class="form-control col-3" id="name" name="name"
                                    aria-describedby="capacityHelp" value="{{ old('name') }}"
                                    placeholder="Enter Your Name">
                                @error('name')
                                    <div class="col-auto">
                                        <span id="CapacityHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label for="accompany_number" class="form-label">Accompany Number</label>
                                <input type="number" class="form-control col-3" id="accompany_number"
                                    name="accompany_number" aria-describedby="capacityHelp"
                                    value="{{ old('accompany_number') }}" placeholder="Enter Accompany Number">
                                @error('accompany_number')
                                    <div class="col-auto">
                                        <span id="PriceHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                                @if (session()->has('accompanyError'))
                                    <div class="col-auto">
                                        <span id="PriceHelpInline" class="form-text">
                                            {{ session('accompanyError') }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-4">
                                <label for="room_number" class="form-label">Room Number</label>
                                <select name="room_number" id="room_number" class="custom-select">
                                    <option value="-1">--Select--</option>
                                    @foreach ($available_rooms as $room)
                                        <option value="{{ $room->number }}"
                                            {{ old('room_number') == $room->number ? 'selected' : '' }}>
                                            {{ $room->number }} -
                                            ${{ $room->price }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_number')
                                    <div class="col-auto">
                                        <span id="floor_numHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <button type="submit" class="btn btn-primary">Reserve Room</button>
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
                                            <th scope="col">Client Name</th>
                                            <th scope="col">Room Number</th>
                                            <th scope="col">Paid Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Name of Reserver</th>
                                            <th scope="col">Approve Reservation</th>
                                            <th scope="col">Cancel Reservation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($reservations->count() > 0)
                                            @foreach ($reservations as $reservation)
                                                <tr>
                                                    <td scope="row">{{ $reservation->client_name }}</td>
                                                    <td>{{ $reservation->room_number }}</td>
                                                    <td>${{ $reservation->paid_price }}</td>
                                                    <td>{{ $reservation->status }}</td>
                                                    <td>{{ $reservation->clientReservation->name }}</td>
                                                   @if($reservation->status == 'Approved')
                                                     <td>
                                                        <form
                                                            action="{{ url('approve_reservation', $reservation->id) }}"
                                                            method="get">

                                                            <button disabled type="submit"
                                                                class="btn btn-outline-primary">Approve</button>
                                                        </form>
                                                    </td>
                                                    @else
                                                     <td>
                                                        <form
                                                            action="{{ url('approve_reservation', $reservation->id) }}"
                                                            method="get">

                                                            <button type="submit"
                                                                class="btn btn-outline-primary">Approve</button>
                                                        </form>
                                                    </td>
                                                   @endif
                                                    <td>
                                                        <form
                                                            action="{{ url('cancel_reservation', $reservation->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger">Cancel</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="emptyData" colspan="6">No Reservations Found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Client Name</th>
                                            <th scope="col">Room Number</th>
                                            <th scope="col">Paid Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Name of Reserver</th>
                                            <th scope="col">Approve Reservation</th>
                                            <th scope="col">Cancel Reservation</th>
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
