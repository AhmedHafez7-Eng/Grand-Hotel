<title>My Reservations</title>
@include('layouts.links')
<style>
    table {
        margin-top: 20px;
    }

    .emptyData {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

</style>

<body>
    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('layouts.header')

    <div class="container">
        <table class="table table-info table-striped">
            <thead>
                <tr>
                    <th scope="col">Client Name</th>
                    <th scope="col">Room Number</th>
                    <th scope="col">Paid Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Name of Reserver</th>
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
                            <td>
                                <form action="{{ url('cancel_reservation', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('Are You Sure To Cancel this Reservation?')">Checkout</button>
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
        </table>
    </div>



    @include('layouts.footer')

    @include('layouts.scripts')