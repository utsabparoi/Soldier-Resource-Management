<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/fontawesome-iconpicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/customised-modal.css') }}" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('backend/css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('backend/css/ace.min.css') }}" class="ace-main-stylesheet"
        id="main-ace-style" />

    <link rel="stylesheet" href="{{ asset('backend/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/dropzone.min.css') }}" />

    {{-- sweetalert --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/sweetalert2.min.css') }}">

    <!-- summernote css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css"
        integrity="sha512-m52YCZLrqQpQ+k+84rmWjrrkXAUrpl3HK0IO4/naRwp58pyr7rf5PO1DbI2/aFYwyeIH/8teS9HbLxVyGqDv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- datapicker-css --}}
    <link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.min.css') }}">

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- custom-css --}}
    <link rel="stylesheet" href="{{ asset('backend/custom_css/custom.css') }}">
    <style>
        @font-face {
            font-family: Merienda;
            src: url("{{ asset('/backend/fonts/Merienda/Merienda-VariableFont_wght.ttf') }}");
        }

        @font-face{
            font-family: MariendaBold;
            src: url("{{ asset('/backend/fonts/Merienda/static/Merienda-SemiBold.ttf') }}");
        }
    </style>
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('backend/js/ace-extra.min.js') }}"></script>

    {{-- lord-icon js --}}
    <script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>

    @yield('css')
</head>

<body class="no-skin">

    @include('backend.layout.header')
    @include('backend.layout.sidebar')
    @yield('content')
    @include('backend.layout.footer')

    <!-- delete form -->
    <form action="" id="deleteItemForm" method="POST">
        @csrf @method('DELETE')
    </form>
    <!-- /.main-container -->

    <!--[if !IE]> -->
    <script src="{{ asset('backend/js/jquery-2.1.4.min.js') }}"></script>

    <!-- <![endif]-->

    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='{{ asset('backend/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
    </script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

    <!-- page specific plugin scripts -->

    <script src="{{ asset('backend/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.sparkline.index.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.flot.resize.min.js') }}"></script>

    <!-- ace scripts -->
    <script src="{{ asset('backend/js/ace-elements.min.js') }}/"></script>
    <script src="{{ asset('backend/js/ace.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- axios scripts -->
    <script src="{{ asset('backend/js/axios.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

    {{-- delete script --}}
    <script src="{{ asset('backend/custom_js/confirm_delete_dialog.js') }}"></script>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/js/sweetalert2.min.js') }}"></script>

    <!-- summernote js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js"
        integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Write Here .....',
                height: 200
            });
        });
    </script>

    {{-- fontawesome --}}
    <script src="{{ asset('backend/js/fontawesome-iconpicker.js') }}"></script>

    <script>
        window.FontAwesomeConfig = {
            searchPseudoElements: true
        }
        $(document).ready(function() {
            $('.fontawesome').iconpicker();
        });
    </script>

    {{-- Datepicker --}}
    <script src="{{ asset('/backend/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".date-picker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>

    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.multiselect').select2();
        });
    </script>

    {{-- x-status js functionality --}}
    <script>
        $(document).on("click", ".updateStatus", function() {

            let status = $(this).children("i").attr("status");
            let item_id = $(this).attr("item-id");

            let url = $(this).attr("item-url");
            // console.log(status, item_id, url);
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: '{!! csrf_token() !!}',
                    status: status,
                    item_id: item_id
                },

                success: function(resp) {
                    console.log(resp)
                    if (resp['status'] == 0) {
                        $("#id-" + item_id).html(
                            "<i class='fa fa-toggle-off text-danger status-icon' status='Inactive' style='font-size: 20px'></i>"
                        );
                        swal.fire({
                            icon: 'success',
                            title: "Status Inactive Successfully",
                            type: "success",
                            timer: 1500
                        });
                    } else if (resp['status'] == 1) {
                        $("#id-" + item_id).html(
                            "<i class='fa fa-toggle-on text-success status-icon' status='Active' style='font-size: 20px'></i>"
                        );
                        swal.fire({
                            icon: 'success',
                            title: "Status Active Successfully",
                            type: "success",
                            timer: 1500
                        });
                    }
                },
                error: function() {
                    alert("Error");
                }
            });
        });
    </script>
    <script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('frontend/js/lottie-player.js') }}"></script>
    @yield('js')
</body>

</html>
