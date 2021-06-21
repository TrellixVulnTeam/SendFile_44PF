@extends('admin.layouts.admin')

@section('title')
    Create New User Mail Infor
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
                        <center><h3 class="box-title">Create New User Mail Infor</h3></center>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{ route('mailinfo.store-mailer') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="firstName">First Name</label>
                                        <input class="form-control py-4" id="firstName" type="text" name="firstName" placeholder="Enter first name"/>
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
                                        <input class="form-control py-4" id="lastName" type="text" name="lastName" placeholder="Enter last name"/>
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
                                <input class="form-control py-4" type="email" id="email" name="email" placeholder="Enter email" required/>
                                @if ($errors->has('email'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('email') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="birth">Birthday</label>
                                <input class="form-control py-4" type="date" id="birth" name="birth" placeholder="Enter birthday"/>
                                @if ($errors->has('birth'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('birth') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="contactNumber">Contact Number</label>
                                <input class="form-control py-4" type="number" id="contactNumber" name="contactNumber" placeholder="Enter contact number"/>
                                @if ($errors->has('contactNumber'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('contactNumber') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="category_id">Category</label>
                                <select class="form-control" id="category" name="category_id">
                                    @foreach($allMailCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
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