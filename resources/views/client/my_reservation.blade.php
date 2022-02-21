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
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Cancel Appointment</th>
                </tr>
            </thead>
            <tbody>
                @if ($appointments->count() > 0)
                    @foreach ($appointments as $appointment)
                        <tr>
                            <th scope="row">{{ $appointment->doctor }}</th>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->message }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <form action="{{ url('cancel_appoint', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('Are You Sure To Cancel this Appointment?')">Cancel</button>
                                </form>
                                {{-- <a class="btn btn-danger"
                                    href="{{ url('cancel_appoint', $appointment->id) }}">Cancel</a> --}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="emptyData" colspan="5">No Appointments Reserved</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>



    @include('layouts.footer')

    @include('layouts.scripts')
