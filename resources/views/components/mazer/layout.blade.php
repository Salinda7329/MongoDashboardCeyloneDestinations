<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Vertical Navbar - Mazer Admin Dashboard</title> --}}
    <title>@yield('page-title')| CeyloneDestinations</title>

    {{-- importing select2 library css for live search  --}}
    <link href="{{ asset('assets/compiled/css/custom_css/select2.min.css') }}" rel="stylesheet" />



    {{-- <link rel="shortcut icon" href="./assets/compiled/svg/favicon.svg" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/compiled/png/destination-title-logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/extensions/flatpickr/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/compiled/css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/custom_css/jqueryTables.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/custom_css/toogle_switch.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/lightbox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/custom_css/student_dashboard/signup_card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/custom_css/student_dashboard/dynamicStepForm.css') }}">
    {{-- jquery datatable --}}
    <script src="{{ asset('assets/compiled/js/custom/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/custom/jquery.dataTables.min.js') }}"></script>


    {{-- custom style to apply for parsley validation error messages --}}
    <style>
        .parsley-pattern,
        .parsley-required {
            font-size: 10px;

            color: red;

        }

        /* Smooth transition */
        #main {
            transition: all 0.3s ease;
        }

        /* When sidebar is collapsed */
        .sidebar-collapsed #main {
            margin-left: 0 !important;
            width: 100% !important;
        }

        /* Optional: default layout (when sidebar is visible) */
        #main {
            margin-left: 250px;
            /* Adjust this to match your sidebar width */
        }
    </style>


</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('assets/compiled/png/destination-logo.png') }}"
                                    alt="Logo" srcset=""
                                    style="width: 120px; height: auto;border-radius:5%"></a>

                            {{-- <img class="header-logo-image" src="{{ asset('assets/landing_page/dist/images/siba_logo.jpg') }}" alt="Logo" style="width: 150px; height: auto;"> --}}
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>

                {{-- inclue common leftsidebar --}}
                {{-- @include('components.mazer.left-sidebar') --}}

                {{-- to include left sidebar according to user role  --}}
                @yield('custom-left-sidebar')

            </div>
        </div>

        {{-- remove navbar-fixed if needed --}}
        <div id="main" class='layout-navbar navbar-fixed'>

            {{-- include common navbar  --}}
            @include('components.mazer.navbar')

            {{-- to include navbar according to user role  --}}
            {{-- @yield('custom-navbar') --}}

            <div id="main-content">

                @yield('main-content')

            </div>

            {{-- indluce footer  --}}
            @include('components.mazer.footer')

        </div>
    </div>
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>

    <script src="{{ asset('assets/extensions/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/date-picker.js') }}"></script>

    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/toastify.js') }}"></script>

    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/sweetalert2.js') }}"></script>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    {{-- custom js for datatables --}}
    {{-- <script src="assets/static/js/pages/datatables.js"></script> --}}
    <script src="{{ asset('assets/extensions/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/parsley.js') }}"></script>
    <script src="{{ asset('assets\compiled\js\lightbox.min.js') }}"></script>


    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script
        src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}">
    </script>
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>

    <!-- Include the necessary dependencies for exporting Excel and PDF start-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/xlsx.full.min.js') }}"></script>



    {{-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/dataTables.buttons.min.js') }}"></script>



    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/jszip.min.js') }}"></script>



    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/pdfmake.min.js') }}"></script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/vfs_fonts.js') }}"></script>


    {{-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/buttons.html5.min.js') }}"></script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/jspdf.umd.min.js') }}"></script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script> --}}
    <script src="{{ asset('assets/export-csv-pdf/jspdf.plugin.autotable.min.js') }}"></script>

    {{-- End  Include the necessary dependencies for exporting Excel and PDF start --}}





    <script src="{{ asset('assets/compiled/js/custom/student/dynamicSignupStepForm.js') }}"></script>

    {{-- importing select2 library js for live search  --}}
    <script src="{{ asset('assets/compiled/js/custom/select2.min.js') }}"></script>


</body>

@yield('after-body')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            // ordering: false,
            padding: false
        });

    });

    document.addEventListener("DOMContentLoaded", function() {
        const burgerBtn = document.querySelector('.burger-btn');
        const sidebar = document.getElementById('sidebar');
        const app = document.getElementById('app');

        // Restore sidebar state from localStorage
        const isSidebarHidden = localStorage.getItem('sidebarHidden') === 'true';

        if (isSidebarHidden) {
            sidebar.classList.add('d-none');
            app.classList.add('sidebar-collapsed');
        }

        burgerBtn.addEventListener('click', function(e) {
            e.preventDefault();
            sidebar.classList.toggle('d-none');
            app.classList.toggle('sidebar-collapsed');

            // Save state to localStorage
            const isHiddenNow = sidebar.classList.contains('d-none');
            localStorage.setItem('sidebarHidden', isHiddenNow);
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
