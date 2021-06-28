@extends('admin.layouts.admin')

@section('title')
    Create New Membership
@endsection

@section('underhead')
<link rel="stylesheet"
    href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <style>
        .none {
            display: none;
        }
    </style>
@endsection

@section('main')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-circle mt-4 ml-4" href="javascript:void(0);" onclick="goBack()"><i class="fa fa-arrow-circle-left fa-lg"></i></a>

                    <h1 class="text-bold text-center">Add New Membership</h1>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <form method="POST" action="{{ route('add.membership') }}">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <h2>General Info</h2>
                                <div class="form-group mt-4">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category_id">
                                        @foreach($allCategories as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="text-primary">Pls click for adding a new feature of service. <i class="fa fa-plus-circle fa-lg" onclick="addFeature()"></i></p>
                                <div id="features">
                                    <div class="input-group feature-item">
                                        <input type="text" class="form-control" name="features[]" placeholder="Enter feature content of Service">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default remote-item">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h2>Payment Info</h2>
                                <div class="form-group mt-4">
                                    <label class="small mb-1" for="inputFirstName">Month</label>
                                    <select class="form-control py-4" id="inputFirstName" name="month">
                                        <option value="1">Every Month</option>
                                        <option value="2">Two Months</option>
                                        <option value="3">Three Months</option>
                                        <option value="4">Four Months</option>
                                        <option value="6">Half of Year</option>
                                    </select>

                                    @if ($errors->has('month'))
                                        <small class="help-block text-danger">
                                            {{ $errors->first('month') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Amount</label>
                                    <input class="form-control py-4" id="inputFirstName" type="number" name="amount"
                                           placeholder="Enter Amount" min="0"/>
                                    @if ($errors->has('amount'))
                                        <small class="help-block text-danger">
                                            {{ $errors->first('amount') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="service_type">Service Type</label>
                                    <select class="form-control" id="service_type" name="service_type" onchange="changeService()">
                                        <option value="1">WEB</option>
                                        <option value="2">APP</option>
                                    </select>
                                </div>
                                <div class="none mt-4" id="service_url">
                                    <div class="form-group">
                                        <label for="appstore_url">App Store url</label>
                                        <input type="text" id="appstore_url" class="form-control" name="appstore_url" placeholder="Pls enter App Store url">
                                    </div>
                                    <div class="form-group">
                                        <label for="googleplay_url">Google Play url</label>
                                        <input type="text" class="form-control" id="googleplay_url" name="googleplay_url" placeholder="Pls enter Google Play url">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-2 mb-2">
                        <button class="btn btn-primary btn-block" type="submit">
                            Create Membership
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
<script  src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $(document).on("click",".remote-item",function(){
            $(this).closest('.feature-item').remove();
        });
    });

    //add new feature
    function addFeature() {
        var viewStr = '                                    <div class="input-group feature-item" style="margin-top: 5px">\n' +
            '                                        <input type="text" name="features[]" class="form-control" placeholder="Enter feature content of Service">\n' +
            '                                        <div class="input-group-btn">\n' +
            '                                            <button type="button" class="btn btn-default remote-item">\n' +
            '                                                <i class="fa fa-trash"></i>\n' +
            '                                            </button>\n' +
            '                                        </div>\n' +
            '                                    </div>';

        $("#features").append(viewStr);
    }

    function changeService() {
        var serviceType = $("#service_type").val();

        if(serviceType == 1) {
            $("#service_url").addClass('none');
        }

        else {
            $("#service_url").removeClass('none');
        }
    }

    function goBack() {
        history.go(-1);
    }
</script>
<script src="assets/demo/datatables-demo.js"></script>
@endsection