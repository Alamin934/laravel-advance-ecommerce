<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/dropify.min.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/tagify.css" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/libs/apex-charts/apex-charts.css" />

    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet'
        type='text/css' />


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin') }}/assets/vendor/js/helpers.js"></script>
    <script src="{{ asset('admin') }}/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('admin.partials.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('admin.partials.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('main-content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-medium">ThemeSelection</a>
                            </div>
                            <div class="d-none d-lg-inline-block">
                                <a href="https://themeselection.com/license/" class="footer-link me-4"
                                    target="_blank">License</a>
                                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                                    Themes</a>

                                <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                                    target="_blank" class="footer-link me-4">Documentation</a>

                                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                    target="_blank" class="footer-link">Support</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js /assets/vendor/js/core.js -->

    <script src="{{ asset('admin') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/js/menu.js"></script>
    <script src="{{ asset('admin') }}/assets/js/toastr.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/sweetalert.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/dropify.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/jQuery.tagify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin') }}/assets/vendor/libs/apex-charts/apexcharts.js">
    </script>

    <!-- Main JS -->
    <script src="{{ asset('admin') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin') }}/assets/js/dashboards-analytics.js"></script>
    {{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'>
    </script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom.js"></script>
    <script>
        // Toaster
        @if (session()->has('message'))
            var type = "{{session()->get('alert-type', 'info')}}";
            switch (type) {
                case 'info':
                    toastr.info("{{session()->get('message')}}");
                    break;
                case 'success':
                    toastr.success("{{session()->get('message')}}");
                    break;
                case 'warning':
                    toastr.warning("{{session()->get('message')}}");
                    break;
                case 'error':
                    toastr.error("{{session()->get('message')}}");
                    break;
            }
        @endif       
    </script>

    @stack('scripts')
</body>

</html>