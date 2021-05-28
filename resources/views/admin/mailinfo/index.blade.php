@extends('admin.layouts.admin')

@section('title')
    Mails
@endsection

@section('underhead')
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
@endsection

@section('main')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mail Infor
            <small>Detail</small>
            <a href="{{ route('mailinfo.send-message') }}" class="btn btn-primary text-uppercase">Send Mail</a>
            <a href="{{ route('mailinfo.create-mailer') }}" class="btn btn-warning text-uppercase">New User Mail</a>
            <a class="btn btn-success text-uppercase" href="javascript:void(0);" id="myBtn">Bulk Upload</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Mail Info</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <h3>All Mails</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr class="no-wrap-container">
                                            <th class="sorting">S.No</th>
                                            <th class="sorting">Date & Time</th>
                                            <th class="sorting">From</th>
                                            <th class="sorting">To</th>
                                            <th class="sorting">Subject</th>
                                            <th class="sorting">Attachment</th>
                                            <th class="sorting">Detail</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($allMessages as $message)
                                            <tr class="{{ $i%2 == 0 ? 'even' : 'odd' }} no-wrap-container" role="row">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $message->created_at }}</td>
                                                <td>{{ $message->fromEmail }}</td>
                                                <td>{{ $message->toEmail }}</td>
                                                <td>{{ $message->subject }}</td>
                                                <td><a href="{{ url($message->fileUrl) }}">Read Me</a></td>
                                                <td>More...</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="no-wrap-container">
                                            <th class="sorting">S.No</th>
                                            <th class="sorting">Date & Time</th>
                                            <th class="sorting">From</th>
                                            <th class="sorting">To</th>
                                            <th class="sorting">Subject</th>
                                            <th class="sorting">Attachment</th>
                                            <th class="sorting">Detail</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <center>{{ $allMessages->links() }}</center>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <h3>All Mailers</h3>
                                <table id="searchable_table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr class="no-wrap-container">
                                        <th>S.No</th>
                                        <th>Email</th>
                                        <th>Full Name</th>
                                        <th>Birthday</th>
                                        {{--<th>Registered At</th>--}}
                                        <th>Manage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($allMailers as $mailer)
                                        <tr class="{{ $i%2 == 0 ? 'even' : 'odd' }} no-wrap-container" role="row">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $mailer->email }}</td>
                                            <td>{{ $mailer->firstName . " " . $mailer->lastName }}</td>
                                            <td>{{ $mailer->birth }}</td>
                                            {{--<td>{{ $mailer->created_at }}</td>--}}
                                            <td>
                                                <form action="{{ route('mailinfo.delete-mailer') }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="mailer_id" value="{{$mailer->id}}">
                                                    <button class="btn btn-sm btn-danger my-1" type="submit"
                                                            onclick="return confirm('Are you sure! You want to delete this mailer?')">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>

                                                <a href="{{ url('admin/mailinfo/get-mailer?mailer_id='.$mailer->id) }}"
                                                   class="btn btn-sm btn-primary" style="margin-top: .3rem">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="no-wrap-container">
                                        <th>S.No</th>
                                        <th>Email</th>
                                        <th>Full Name</th>
                                        <th>Birthday</th>
                                        {{--<th>Registered At</th>--}}
                                        <th>Manage</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <form id="myModal" class="modal" method="post" action="{{route('mailinfo.bulk-mailer')}}" enctype="multipart/form-data">
    @csrf
    <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Bulk Import User Mail Infors</h2>
            </div>
            <div class="modal-body">
                <p>Pls select csv/excel file</p>
                <input class="form-control" type="file" name="importFile" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" style="color:black;">Import</button>
            </div>
        </div>
    </form>



@endsection

@section('customjs')
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script>
        $(function () {
            $('#searchable_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('#searchable_table2').DataTable();
        })

    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        };

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>
@endsection