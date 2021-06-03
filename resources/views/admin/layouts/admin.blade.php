<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link href="{{asset('plugins/toastr/toast.style.min.css')}}" rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .no-wrap-container th,
        .no-wrap-container td
        {
            white-space: nowrap !important;
            /* background: red !important; */
        }
        .d-inline{
            display: inline !important;
        }

        th {
            background-color: #0a568c;
            color: white;
        }
    </style>

    @yield('underhead')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-mini"><b>{{ env('APP_NAME_SHORT') }}</b></span>
                <span class="logo-lg"><b>{{ env('APP_NAME') }}</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span></a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="left-0">
                            <a href="javascript:void(0);" class="btn btn-flat text-capitalize" onclick="godaddySet('handle')">
                                <div id="godaddyState">Godaddy : <i class="fa fa-toggle-on"></i> ON</div>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('logout') }}" class="btn btn-flat text-capitalize"><i class="fa fa-sign-out"></i>&nbsp; log out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('images/SELECTIVE-TRADES.png') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p class="text-uppercase">{{ Session::get("name") }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <hr style="margin: 0;">
                    @php
                    $active = isset($active) ? $active : 'dashboard';
                    @endphp
                    <li class="{{ preg_match('/dashboard/i', $active) ? 'active' : '' }}">
                        <a href="{{ url('admin') }}"><i class="fa fa-tachometer"></i><span class="text-capitalize">Dashboard</span></a>
                    </li>
                    <li class="{{ preg_match('/trades/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('trades.index') }}"><i class="fa fa-trademark"></i><span class="text-capitalize">trades</span></a>
                    </li>
                    <li class="{{ preg_match('/users/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i><span class="text-capitalize">users</span></a>
                    </li>
                    <li class="{{ preg_match('/profile/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('profile') }}"><i class="fa fa-pencil"></i><span class="text-capitalize">edit profile</span></a>
                    </li>
                    <li class="{{ preg_match('/edit user profile/i', $active) ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-pencil"></i><span class="text-capitalize">edit user profile</span></a>
                    </li>
                    <li class="{{ preg_match('/alerts/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('option.index') }}"><i class="fa fa-object-ungroup"></i><span class="text-capitalize">option alerts</span></a>
                    </li>
                    <li class="{{ preg_match('/breakout/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('breakout.index') }}"><i class="fa fa-cart-plus"></i><span class="text-capitalize">Breakout Stocks</span></a>
                    </li>
                    <li class="{{ preg_match('/longterm/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('longterm.index') }}"><i class="fa fa-support"></i><span class="text-capitalize">Long Term Stocks</span></a>
                    </li>
                    <li class="{{ preg_match('/options flow/i', $active) ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-object-ungroup"></i><span class="text-capitalize">options flow</span></a>
                    </li>
                    <li class="{{ preg_match('/darkpool/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('darkpool.index') }}"><i class="fa fa-database"></i><span class="text-capitalize">dark pool data</span></a>
                    </li>
                    <li class="{{ preg_match('/volume/i', $active) ? 'active' : '' }}">
                        <a href="{{route('volume.index')}}"><i class="fa fa-volume-up"></i><span class="text-capitalize">unusual volume</span></a>
                    </li>
                    <li class="{{ preg_match('/market news/i', $active) ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-rss"></i><span class="text-capitalize">market news</span></a>
                    </li>
                    <li class="{{ preg_match('/watchlist/i', $active) ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-search"></i><span class="text-capitalize">Watch List</span></a>
                    </li>
                    <li class="{{ preg_match('/document/i', $active) ? 'active' : '' }}">
                        <a href="{{ route('document.index') }}"><i class="fa fa-file"></i><span class="text-capitalize">documents</span></a>
                    </li>
                    <li class="{{ preg_match('/testimonial/i', $active) ? 'active' : '' }}">
                        <a href="{{route('testimonial')}}"><i class="fa fa-superpowers"></i><span class="text-capitalize">testimonial</span></a>
                    </li>
                    <li class="{{ preg_match('/membercategory/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/membercategory')}}"><i class="fa fa-list-ul"></i><span class="text-capitalize">membership category</span></a>
                    </li>
                    <li class="{{ preg_match('/membership/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/membership')}}"><i class="fa fa-gift"></i><span class="text-capitalize">membership</span></a>
                    </li>
                    <li class="{{ preg_match('/expenses/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/expense')}}"><i class="fa fa-cart-plus"></i><span class="text-capitalize">expenses</span></a>
                    </li>
                    <li class="{{ preg_match('/expensecategory/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/expensecategory')}}"><i class="fa fa-list-alt"></i><span class="text-capitalize">expenses category</span></a>
                    </li>
                    <li class="{{ preg_match('/coupon/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/coupon')}}"><i class="fa fa-money"></i><span class="text-capitalize">Coupon</span></a>
                    </li>
                    <li class="{{ preg_match('/ticker/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/ticker')}}"><i class="fa fa-ticket"></i><span class="text-capitalize">Ticker</span></a>
                    </li>
                    <li class="{{ preg_match('/option-display/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/option-display')}}"><i class="fa fa-list-alt"></i><span class="text-capitalize">Options</span></a>
                    </li>
                    <li class="{{ preg_match('/mailinfo/i', $active) ? 'active' : '' }}">
                        <a href="{{url('admin/mailinfo')}}"><i class="fa fa-envelope-open"></i><span class="text-capitalize">Mail Info</span></a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('main')

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>
                Copyright &copy; 2014-2019
                <a href="{{ url('admin') }}">{{ env('APP_NAME') }}</a>.
            </strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings
                        </h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>Some information about this general settings option</p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>Other sets of options are available</p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>Allow the user to show his name in blog posts</p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
        @php
            use Illuminate\Support\Facades\Session;
            $godaddyStates = '';
            if(Session::has('godaddyOn'))
            {
                $godaddyStates = 'y';
            }
        @endphp
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <script src="{{asset('plugins/toastr/toast.script.js')}}"></script>
    {{--Global JS --}}
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var godaddyTimer = null;
        var godaddyS = '{{ $godaddyStates }}';

        godaddySet('auto');

        function godaddySet(reqD) {

            var flags = false;

            if(godaddyS == 'y') {
                if(reqD == 'auto')
                {
                    flags = true;
                }
                else {
                    flags = false;
                }
            }
            else {
                if(reqD == 'handle') {
                    flags = true;
                } else {
                    flags = false;
                }
            }

            if (flags == true) {
                godaddyS = 'y';
                setGodaddy('t');
                godaddyTimer = setInterval(getDataGodaddy, 180000);
                $("#godaddyState").html('Godaddy : <i class="fa fa-toggle-on"></i> ON');
            }
            else {
                godaddyS = '';
                setGodaddy('f');
                clearInterval(godaddyTimer);
                $("#godaddyState").html('Godaddy : <i class="fa fa-toggle-off"></i> OFF');
            }
        }

        function getDataGodaddy() {
            $.post("{{ url('admin/get-godaddy') }}",
                {
                    reqParam: "hello"
                },
                function(data, status){
                    console.log(data);
                });
        }

        function setGodaddy(isOn) {
            $.post("{{ url('admin/godaddy-handle') }}",
                {
                    isOn: isOn
                },
                function(data, status){
                    console.log(data);
                });
        }

        function getDateFormat(pDate) {
            var iDate = new Date(pDate);
            var iMonth = iDate.getMonth() + 1;

            if(iMonth < 10) {
                iMonth = "0" + iMonth;
            }

            var iDay = iDate.getDate();

            if(iDay < 10) {
                iDay = "0" + iDay;
            }

            return iDate.getFullYear() + "" + iMonth + iDay;
        }

    </script>
    <script>
        @if(Session::has('success') || Session::has("failure"))

            var typeMessage = "success";
            var messageContent = "{{Session::get('success')}}";

            @if(Session::has('failure'))
                typeMessage = "error";
                messageContent = "{{Session::get('failure')}}";
            @endif

            $.Toast("Notice", messageContent, typeMessage, {
                has_icon:true,
                has_close_btn:true,
                position_class: "toast-top-right",
                stack: true,
                fullscreen:false,
                timeout:6000,
                spacing:30,
                sticky:false,
                has_progress:true,
                rtl:false,
            });
        @endif
    </script>

    @yield('customjs')
</body>

</html>