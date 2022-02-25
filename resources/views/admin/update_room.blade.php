@include('admin.links')
<style>
    form.updateRoom {
        padding: 50px;
    }

    form.updateRoom button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        box-shadow: 2px 4px 10px rgb(0 0 0 / 20%);
    }

    form.updateRoom [type='file'] {
        width: 50%;
        border: none;
    }

    form.updateRoom select {
        width: 100%;
        cursor: pointer;
    }

    form.updateRoom select,
    form.updateRoom select option {
        text-transform: capitalize !important;
    }

    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .form-label {
        width: 100%;
    }

    /*
    #docImagePreview {
        display: none;
    } */

    .alert {
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        width: 500px;
        padding: 20px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        color: rgb(247, 60, 60);
    }

    .mb-3:last-child {
        margin-top: 20px;
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
                        <h1>Update Room</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Update Room</li>
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
                        <form action="{{ url('edit_room', $room->number) }}" method="POST" autocomplete="off"
                            class="updateRoom">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="capacity" class="form-label">Room Capacity</label>
                                <input type="number" class="form-control" id="capacity" name="capacity"
                                    aria-describedby="capacityHelp" value="{{ $room->capacity }}">
                                @error('capacity')
                                    <div class="col-auto">
                                        <span id="NameHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Room Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    aria-describedby="capacityHelp" value="{{ $room->price }}">
                                @error('price')
                                    <div class="col-auto">
                                        <span id="NameHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url('show_rooms') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
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
