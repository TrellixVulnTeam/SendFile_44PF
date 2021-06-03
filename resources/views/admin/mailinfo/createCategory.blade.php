@extends('admin.layouts.admin')

@section('title')
    Create Mailer Category
@endsection

@section('underhead')

@endsection

@section('main')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box">
                    <div class="box-header">
                        <a href="{{ url('admin/mailinfo') }}"><h4><i class="fa fa-mail-reply fa-th-large"></i></h4></a>
                        <center><h3 class="box-title">Create Mailer Category</h3></center>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{ route('mailinfo.store-category') }}">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="title">Title</label>
                                <input class="form-control py-4" type="text" id="title" name="title" placeholder="Enter Title" required/>
                                @if ($errors->has('title'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('title') }}
                                    </small>
                                @endif
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Create Category</button>
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

@endsection