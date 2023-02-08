<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    <link href="{{ asset('frontend/fonts/feather/feather.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/libs/dragula/dist/dragula.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/libs/prismjs/themes/prism.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/libs/%40yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/libs/tippy.js/dist/tippy.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.min.css') }}">
    <title>Sanoo Edu</title>
</head>

<body>
    <!-- Navbar -->
    @include('layouts.pages.navbar');
    <!-- Header -->
    @yield('header', '')
    <!-- Feature -->
    @yield('feature', '')
    <!-- Recommended -->
    @yield('main', '')
    <!-- Footer -->
    @include('layouts.pages.footer');

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('frontend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/dragula/dist/dragula.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/jQuery.print/jQuery.print.js') }}"></script>
    <script src="{{ asset('frontend/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('frontend/libs/prismjs/components/prism-scss.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/%40yaireo/tagify/dist/tagify.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontend/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/typed.js/lib/typed.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/jsvectormap/dist/maps/world.js') }}"></script>
    <script src="{{ asset('frontend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('frontend/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- clipboard -->
    <script src="../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('frontend/js/theme.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('title') && Session::get('text'))
        var type = "{{ Session::get('alert-type') }}";

        switch (type) {
            case 'info':
                Swal.fire({
                    icon: 'info',
                    title: '{{ Session::get("title") }}',
                    text: 'Something went wrong!',
                })
                break;
            case 'success':
                Swal.fire({
                    icon: 'success',
                    title: '{{ Session::get("title") }}',
                    text: '{{ Session::get("text") }}',
                });
                break;
            case 'warning':
                Swal.fire({
                    icon: 'warning',
                    title: '{{ Session::get("title") }}',
                    text: '{{ Session::get("text") }}',
                });
                break;
            case 'error':
                Swal.fire({
                    icon: 'error',
                    title: '{{ Session::get("title") }}',
                    text: '{{ Session::get("text") }}',
                });
                break;
            default:
                Swal.fire({
                    icon: 'info',
                    title: 'Có gì đó sai sai...',
                    text: 'Chẳng có gì ở đây!',
                });
                break;
        }
        @endif
    </script>

</body>

</html>