@extends('admin.layouts.admin')

@section('title')
    Send Mail
@endsection

@section('underhead')
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor/plugin/samples/css/samples.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ckeditor/plugin/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main')

    <!-- Main content -->
    <section>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <center><h1 class="box-title">Sending Mail</h1></center>
                        <form method="POST" action="{{ route('document.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="title">Subject</label>
                                <input class="form-control py-4" id="title" type="text" name="title" placeholder="Enter Subject" required/>
                                @if ($errors->has('title'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('title') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-grou">
                                <h4>Mail list</h4>
                                <select class="js-example-basic-single form-control" name="email" required>
                                    <option disabled>Pls Select Mail</option>
                                    @foreach($allMailers as $mailer)
                                        <option value="{{ $mailer->email }}">{{ $mailer->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label class="small mb-1" for="accept-editor">Content</label>
                                <textarea id="accept-editor" name="contents"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="file_url">Attempt File</label>
                                <input class="form-control py-4" id="file_url" type="file" name="file_url" placeholder="Pls Select File"/>
                                @if ($errors->has('file_url'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('file_url') }}
                                    </small>
                                @endif
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Crate Document</button>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('customjs')

    <script src="{{ asset('plugins/ckeditor/plugin/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        "use strict";
        //response will assign this function

        CKEDITOR.replace( 'accept-editor' );

    </script>

@endsection