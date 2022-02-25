@include('admin.links')
<style>
    form.addDoctor {
        padding: 50px;
    }

    form.addDoctor button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        box-shadow: 2px 4px 10px rgb(0 0 0 / 20%);
    }

    form.addDoctor [type='file'] {
        width: 50%;
        border: none;
    }

    form.addDoctor select {
        width: 100%;
        cursor: pointer;
    }

    form.addDoctor select,
    form.addDoctor select option {
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

    #docImagePreview {
        display: none;
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

    #NameHelpInline,
    #phoneHelpInline,
    #specHelpInline,
    #roomNoHelpInline,
    #ImgHelpInline {
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
                        <h1>Add Doctors</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Add Doctors</li>
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
                        <form action="add_doctor" method="POST" enctype="multipart/form-data" autocomplete="off"
                            class="addDoctor">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Doctor Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="nameHelp" value="{{ old('name') }}">
                                @error('name')
                                    <div class="col-auto">
                                        <span id="NameHelpInline" class="form-text">
                                            {{ $message = 'Name Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    aria-describedby="phoneHelp" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="col-auto">
                                        <span id="phoneHelpInline" class="form-text">
                                            {{ $message = 'Phone Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="spec" class="form-label">Specialization</label>
                                <select class="form-select form-select-lg mb-3" id="spec" name="spec" aria-label="spec">
                                    <option value="-1" selected>--Select--</option>
                                    <option value="skin" {{ old('spec') == 'skin' ? 'selected' : '' }}>skin</option>
                                    <option value="heart" {{ old('spec') == 'heart' ? 'selected' : '' }}>heart
                                    </option>
                                    <option value="eye" {{ old('spec') == 'eye' ? 'selected' : '' }}>eye</option>
                                    <option value="nose" {{ old('spec') == 'nose' ? 'selected' : '' }}>nose</option>
                                </select>
                                @error('spec')
                                    <div class="col-auto">
                                        <span id="specHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="roomNo" class="form-label">Room No.</label>
                                <input type="text" class="form-control" id="roomNo" name="roomNo"
                                    aria-describedby="roomNoHelp" value="{{ old('roomNo') }}">
                                @error('roomNo')
                                    <div class="col-auto">
                                        <span id="roomNoHelpInline" class="form-text">
                                            {{ $message = 'Room Number Is Required!' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Doctor Image</label>
                                <label for="file-upload" class="custom-file-upload">
                                    <i class="fas fa-cloud-upload-alt"></i> Upload
                                </label>
                                <input id="file-upload" type="file" name="docImg" onchange="readURL(this);" />
                                <img id="docImagePreview" src="" alt="your image" />
                                @error('docImg')
                                    <div class="col-auto">
                                        <span id="ImgHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{ url('show_doctors') }}" class="btn btn-secondary">Cancel</a>
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

{{-- Show Image beside file input --}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {

                $('#docImagePreview').css('display', 'block')
                    .attr('src', e.target.result)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
