<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/backend.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto"> 
                <li class="nav-item my-auto">
                    <a class="nav-link" style="font-weight: bold;">{{ auth()->user()->name }}</a>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="/adminlte/dist/img/admin.png" height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <img src="/adminlte/dist/img/admin.png" style="width: 50%; height:auto; margin:auto;" class="dropdown-header rounded-circle">
                        <span style="font-weight:bold;" class="dropdown-header">{{ auth()->user()->name }}</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <form action="/admin/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item text-center"></i>Sign Out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin/dashboard" class="brand-link text-center">
                <img src="/img/logo/logo-1.svg" alt="Dashboard" style="width: 200px;height: auto;" style="opacity: .8">
<!--                 <span class="font-weight-bold text-primary">LOGO</span> -->
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline mt-3 mb-3">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/property') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Listing<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/property" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Property</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/land" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Land</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="/admin/property-type" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Property Request Listing</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/land') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-street-view"></i>
                                <p>Land<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/land" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Land</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                        @if (Auth::user()->role == 1)
                            <li class="nav-item">
                                <a href="/admin/list-admin" class="nav-link {{ request()->is('admin/list-admin') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Admin
                                    </p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/inbox-contact')||request()->is('inbox-inquiry') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-inbox"></i>
                                <p>Inbox<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/inbox-contact" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact messages</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/inbox-inquiry" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inquiry messages</p>
                                    </a>
                                </li> 
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->is('admin/customize/homepage') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Customize Page<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/customize/homepage" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/customize/about-us" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About Us</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/customize/services" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Services</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/customize/contact" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact Us</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    @yield('content')

    {{-- IMage Modal --}}
    <div class="modal fade" id="imageModalCenter" tabindex="-1" role="dialog" aria-labelledby="imageModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 60%" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" class="showPic" style="width: 100%; height: auto; object-fit:cover">
            </div>
        </div>
        </div>
    </div>
    {{-- IMage Modal --}}

    <footer class="main-footer">
        <strong>Copyright &copy; <a href="/admin" style="color: #a5876a;">Equatorial Property</a>.</strong>
        All rights reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/adminlte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/adminlte/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/adminlte/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminlte/plugins/jszip/jszip.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script [Data Table]-->
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
          });
        });
    </script>

    <script>
        $('#propertyImages').on('change',function(){
            //get the file name
            var numFiles = $(this).get(0).files.length
            var fileName = $(this).val();
            //replace the "Choose a file" label
            
            if (this.files && this.files.length > 1) {
                // fileName = Array.from(this.files).map(({name}) => name + ', ');
                // $(this).next('.custom-file-label').html(fileName);
                $(this).next('.custom-file-label').html(numFiles+" file selected");
            }else{
                $(this).next('.custom-file-label').html(fileName);
            }
        })

        $('#landImages').on('change',function(){
            //get the file name
            var numFiles = $(this).get(0).files.length
            var fileName = $(this).val();
            //replace the "Choose a file" label
            
            if (this.files && this.files.length > 1) {
                // fileName = Array.from(this.files).map(({name}) => name + ', ');
                // $(this).next('.custom-file-label').html(fileName);
                $(this).next('.custom-file-label').html(numFiles+" file selected");
            }else{
                $(this).next('.custom-file-label').html(fileName);
            }
        })
    </script>

    <script>
        $(document).ready(function () {
            $('#carouselExampleControls').find('.carousel-item').first().addClass('active');
        });
    </script>

    <script>
        $('.openImg').click(function() {
            var src =$(this).attr('src');

            $('.showPic').attr('src', src);
        });
    </script>
    
    <script>
        function updateSymbol(e){
            var selected = $(".currency-selector option:selected");
            $(".currency-symbol").text(selected.data("symbol"))
            if (selected.data("symbol")=="POI"){
                $(".currency-amount").prop('readonly', true);
                $(".currency-amount").prop("placeholder", "Price on Inquiry")
                $(".currency-amount").prop("value", 0)
            }else{
                $(".currency-amount").prop('readonly', false);
                $(".currency-amount").prop("placeholder", selected.data("placeholder"))
            }
            $('.currency-addon-fixed').text(selected.text())
        }

        $(".currency-selector").on("load change", updateSymbol)
        updateSymbol()
    </script>

    {{-- customize homepage --}}
    <script>
        $("#right_select").change(function () {
            var selected_option = $('#right_select').val();
            if (selected_option === "images_input_right") {
                $('#images_input_right').show();
                $("#video_input_right").hide();
            }
            if (selected_option === "video_input_right") {
                $("#video_input_right").show();
                $('#images_input_right').hide();
            }
        })
    </script>

    <script>
        $("#left_select").change(function () {
            var selected_option = $('#left_select').val();
            if (selected_option === "images_input_left") {
                $('#images_input_left').show();
                $("#video_input_left").hide();
            }
            if (selected_option === "video_input_left") {
                $("#video_input_left").show();
                $('#images_input_left').hide();
            }
        })
    </script>

    {{-- <script>
        $(document).on('change keyup', function(e){
        let filled = true;
            $("#saveForm input").each(function() {
            let value = this.value
            if ((value)&&(value.trim() !=''))
                {
                    filled = false
                }else{
                    filled = true
                    return false
                }
            });
        
        if(filled){
                $('#btnSubmit').text('Draft');
            }else{
                $('#btnSubmit').text('Submit');
            }
        })
    </script> --}}
</body>
</html>