@include('admin.links')
<style>
    form.sendEmail {
        padding: 50px;
    }

    form.sendEmail button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        box-shadow: 2px 4px 10px rgb(0 0 0 / 20%);
    }

    .form-label {
        width: 100%;
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
                        <h1>Email Notification</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Email Notification</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment->email }}</td>
                                                <td>{{ $appointment->phone }}</td>
                                                <td>{{ $appointment->doctor }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->message }}</td>
                                                <td>{{ $appointment->status }}</td>
                                            </tr>
                                    </tbody>
                                </table>

                    <div class="col-12">
                        <form action="{{url('sendEmail', $appointment->id)}}" method="POST" autocomplete="off" class="sendEmail">
                            @csrf
                            <div class="mb-3">
                                <label for="greeting" class="form-label">Greeting</label>
                                <input type="text" class="form-control" id="greeting" name="greeting"
                                    aria-describedby="greetingHelp">

                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <input type="text" class="form-control" id="body" name="body"
                                    aria-describedby="bodyHelp">
                                
                            </div>

                            <div class="mb-3">
                                <label for="actionText" class="form-label">Action Text</label>
                                <input type="text" class="form-control" id="actionText" name="actionText"
                                    aria-describedby="actionTextHelp">
                            </div>

                            <div class="mb-3">
                                <label for="actionURL" class="form-label">Action URL</label>
                                <input type="text" class="form-control" id="actionURL" name="actionURL"
                                    aria-describedby="actionURLHelp">
                            </div>

                            <div class="mb-3">
                                <label for="endPart" class="form-label">End Part</label>
                                <input type="text" class="form-control" id="endPart" name="endPart"
                                    aria-describedby="endPartHelp">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Send</button>
                                <a href="{{ url('show_appointments') }}" class="btn btn-secondary">Cancel</a>
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
