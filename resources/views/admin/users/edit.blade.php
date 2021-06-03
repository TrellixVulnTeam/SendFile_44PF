@extends('admin.layouts.admin')

@section('title')
    Edit Profile
@endsection

@section('underhead')

@endsection

@section('main')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6  col-xs-offset-3">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        @if (session('id') != $user->id)
                            Edit User
                        @else
                            Edit Profile
                        @endif
                    </h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        {{--<form method="POST" action="{{ route('admin.users.store') }}">--}}
                            {{--@csrf--}}
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">First Name</label>
                            <input class="form-control py-4" id="inputFirstName" type="text" name="first_name" placeholder="Enter first name" value="{{ $user->first_name }}"/>
                            @if ($errors->has('first_name'))
                            <small class="help-block text-danger">
                                {{ $errors->first('first_name') }}
                            </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">Last Name</label>
                            <input class="form-control py-4" id="inputFirstName" type="text" name="last_name" placeholder="Enter last name" value="{{ $user->last_name }}"/>
                            @if ($errors->has('last_name'))
                            <small class="help-block text-danger">
                                {{ $errors->first('last_name') }}
                            </small>
                            @endif
                        </div>


                        <div class="form-group">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control py-4" type="email" id="email" name="email" placeholder="Enter email" value="{{ $user->email }}"/>
                            @if ($errors->has('email'))
                            <small class="help-block text-danger">
                                {{ $errors->first('email') }}
                            </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="role">Level</label>
                            <select class="form-control py-4" id="role" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{$role->role}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter new password" name="password"/>
                            @if ($errors->has('password'))
                            <small class="help-block text-danger">
                                {{ $errors->first('password') }}
                            </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                            <input class="form-control py-4" id="inputConfirmPassword" name="password_confirmation" type="password" placeholder="Confirm new password"/>
                            @if ($errors->has('password_confirmation'))
                            <small class="help-block text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </small>
                            @endif
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">
                            @if (session('id') != $user->id)
                                Update User
                            @else
                                Update Profile
                            @endif
                        </button>
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