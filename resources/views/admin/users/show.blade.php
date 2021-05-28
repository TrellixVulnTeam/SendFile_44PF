@extends('admin.layouts.admin')

@section('title')
    User Show
@endsection

@section('underhead')

@endsection

@section('main')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Users
        <small>Detail</small>
        <a href="" class="btn btn-primary text-uppercase">create</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Users</li>
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">User</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="container-fluid">
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">{{ $user->name }}</li>
                        </ol>
                        <div class="card shadow-lg border-0 rounded-lg mt-2">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">Name</label>
                                            <p>{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger text-uppercase my-1">delete</button>
                                </form>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning text-uppercase my-1">edit</a>
                            </footer>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->
@endsection

@section('customjs')

@endsection