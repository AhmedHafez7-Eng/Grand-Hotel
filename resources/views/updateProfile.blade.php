@include('admin.links')
<style>
    form.updateProfile {
        padding: 50px;
    }

    form.updateProfile button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        box-shadow: 2px 4px 10px rgb(0 0 0 / 20%);
    }

    form.updateProfile [type='file'] {
        width: 50%;
        border: none;
    }

    form.updateProfile select {
        width: 100%;
        cursor: pointer;
    }

    form.updateProfile select,
    form.updateProfile select option {
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
                        <h1>Update Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Update Profile</li>
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
                        <form action="{{ url('edit_profile', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data" autocomplete="off" class="updateProfile">
                            @csrf
                            @method('PUT')


                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="nameHelp" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <div class="col-auto">
                                        <span id="NameHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                @error('email')
                                    <div class="col-auto">
                                        <span id="emailHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    aria-describedby="passwordHelp" value="{{ Auth::user()->password }}">
                                @error('password')
                                    <div class="col-auto">
                                        <span id="passwordHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="national_id" class="form-label">National ID</label>
                                <input type="number" class="form-control" id="national_id" name="national_id"
                                    aria-describedby="national_idHelp" value="{{ Auth::user()->national_ID }}">
                                @error('national_id')
                                    <div class="col-auto">
                                        <span id="national_idHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select form-select-lg mb-3" id="country" name="country"
                                    aria-label="country">
                                    <option value="-1" selected>--Select--</option>
                                    <option value="egypt" {{ Auth::user()->country == 'egypt' ? 'selected' : '' }}>
                                        egypt
                                    </option>
                                    <option value="usa" {{ Auth::user()->country == 'usa' ? 'selected' : '' }}>
                                        usa
                                    </option>
                                    <option value="tunisia"
                                        {{ Auth::user()->country == 'tunisia' ? 'selected' : '' }}>
                                        tunisia</option>
                                    <option value="france" {{ Auth::user()->country == 'france' ? 'selected' : '' }}>
                                        france
                                    </option>
                                </select>
                                @error('country')
                                    <div class="col-auto">
                                        <span id="countryHelpInline" class="form-text">
                                            {{ $message = 'You Must Select One' }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <label class="radio-inline">
                                    <input type="radio" id="male" value="male" name="gender"
                                        @if (Auth::user()->gender == 'male') checked @endif>
                                    Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="female" value="female" name="gender"
                                        @if (Auth::user()->gender == 'female') checked @endif>
                                    Female
                                </label>
                                @error('gender')
                                    <div class="col-auto">
                                        <span id="genderHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <label for="file-upload" class="custom-file-upload">
                                    <i class="fas fa-cloud-upload-alt"></i> Upload
                                </label>
                                <input id="file-upload" type="file" name="usrImg" onchange="readURL(this);" />
                                <img id="usrImgPreview" src="../../../usersImages/{{ Auth::user()->avatar_Img }}"
                                    alt="your image" width="150" height="150" />
                                @error('usrImg')
                                    <div class="col-auto">
                                        <span id="ImgHelpInline" class="form-text">
                                            {{ $message }}
                                        </span>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url('home') }}" class="btn btn-secondary">Cancel</a>
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

                $('#usrImgPreview')
                    .attr('src', e.target.result)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
