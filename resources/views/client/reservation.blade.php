<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make a Reservation</h1>
        <form class="main-form" action="{{ url('/home/make_reservation') }}" method="POST">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="name" class="form-label">Client Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Full name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="col-auto">
                            <span id="nameHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <label for="accompany_number" class="form-label">Accompany Number</label>
                    <input type="number" name="accompany_number" class="form-control" placeholder="Accompany Number"
                        value="{{ old('accompany_number') }}">
                    @error('accompany_number')
                        <div class="col-auto">
                            <span id="accompany_numberHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                    @if (session()->has('accompanyError'))
                        <div class="col-auto">
                            <span id="accompany_numberHelpInline" class="form-text">
                                {{ session('accompanyError') }}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-sm-6 col-lg-12 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <label for="room_number" class="form-label">Room Number</label>
                    <select name="room_number" id="room_number" class="custom-select">
                        <option value="-1">--Select--</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->number }}"
                                {{ old('room_number') == $room->number ? 'selected' : '' }}>
                                {{ $room->number }} -
                                ${{ $room->price }}</option>
                        @endforeach
                    </select>
                    @error('room_number')
                        <div class="col-auto">
                            <span id="room_numberHelpInline" class="form-text">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Make Reservation</button>
        </form>
    </div>
</div> <!-- .page-section -->