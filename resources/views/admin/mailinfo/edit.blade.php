@extends('admin.layouts.admin')

@section('title')
    Edit User Mail Infor
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
                        <center><h3 class="box-title">Edit User Mail Infor</h3></center>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{ route('mailinfo.update-mailer') }}">
                            @csrf
                            <input type="hidden" value="{{ $mailer->id }}" name="mailer_id">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="firstName">First Name</label>
                                        <input class="form-control py-4" id="firstName" type="text" name="firstName" value="{{ $mailer->firstName }}"/>
                                        @if ($errors->has('firstName'))
                                            <small class="help-block text-danger">
                                                {{ $errors->first('firstName') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="lastName">Last Name</label>
                                        <input class="form-control py-4" id="lastName" type="text" name="lastName" value="{{ $mailer->lastName }}"/>
                                        @if ($errors->has('lastName'))
                                            <small class="help-block text-danger">
                                                {{ $errors->first('lastName') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control py-4" type="email" id="email" name="email" value="{{ $mailer->email }}" required/>
                                @if ($errors->has('email'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="birth">Birthday</label>
                                <input class="form-control py-4" type="date" id="birth" name="birth" value="{{ $mailer->birth }}"/>
                                @if ($errors->has('birth'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('birth') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="category">Category</label>
                                <select id="category" class="form-control" name="category_id">
                                    @foreach($allCategories as $category)
                                        <option value="{{ $category->id }}" @if($mailer->category_id == $category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="contactNumber">Contact Number</label>
                                <input class="form-control py-4" type="number" id="contactNumber" name="contactNumber" value="{{ $mailer->contactNumber }}"/>
                                @if ($errors->has('contactNumber'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('contactNumber') }}
                                    </small>
                                @endif
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Edit Account</button>
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