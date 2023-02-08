<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        @include('layouts.admin.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('layouts.admin.content')
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('layouts.admin.footer')
        <!-- /.footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        {{-- modal --}}
        <!-- Button trigger modal -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var type = "{{ Session::get('alert-type') }}";

        // show comfirm delete
        function areYouSure(link) {
            Swal.fire({
                title: 'Xác nhận xoá?',
                text: "Bạn không thể khôi phục khi đã xoá!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, vẫn xoá!',
                cancelButtonText: 'Huỷ bỏ',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.assign(link);
                }
            })
            return false;
        }

        // show toast
        @if (Session::has('message')) const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
        
            switch (type) {
            case 'info':
            Toast.fire({
            icon: 'info',
            title: '{{ Session::get('message') }}'
            });
            break;
            case 'success':
            Toast.fire({
            icon: 'success',
            title: '{{ Session::get('message') }}'
            });
            break;
            case 'warning':
            Toast.fire({
            icon: 'warning',
            title: '{{ Session::get('message') }}'
            });
            break;
            case 'error':
            Toast.fire({
            icon: 'error',
            title: '{{ Session::get('message') }}'
            });
            break;
            case 'errorDelete':
            Swal.fire(
            'Xoá thất bại!',
            '{{ Session::get('message') }}',
            'error',
            );
            break;
            case 'successDelete':
            Swal.fire(
            'Xoá thành công!',
            '{{ Session::get('message') }}',
            'success',
            );
            break;
            default:
            Toast.fire({
            icon: 'info',
            title: 'Nothing'
            });
            break;
            }
        @endif
    </script>

    <!-- summernote -->
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 200
        });
    </script>

    <!-- show desc -->
    {{-- <script type="text/javascript">
        $(window).on('load', function() {
            $('#create-new-block-grade').modal('show');
        });

        function showDesc(desc) {
            $('#desc').html(desc)
            $(window).on('load', function() {
                $('#create-new-block-grade').modal('show');
            });
            // Swal.fire({
            //     title: 'Mô tả',
            //     html: desc,
            //     width: '60%',
            // })
        }
    </script> --}}

    <!-- showImage -->
    <script type="text/javascript">
        function showImage(image) {
            Swal.fire({
                imageUrl: image,
                imageHeight: 500,
                imageAlt: 'Lỗi hiển thị.',
            })
        }
    </script>
</body>

</html>
