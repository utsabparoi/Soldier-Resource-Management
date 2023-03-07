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

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('backend/css/ace-part2.min.css') }}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('backend/css/ace-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/ace-rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/dropzone.min.css') }}" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('backend/css/ace-ie.min.css') }}" />
    <![endif]-->

    {{-- sweetalert --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/sweetalert2.min.css') }}">

    <!-- summernote css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css"
        integrity="sha512-m52YCZLrqQpQ+k+84rmWjrrkXAUrpl3HK0IO4/naRwp58pyr7rf5PO1DbI2/aFYwyeIH/8teS9HbLxVyGqDv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- datapicker-css --}}
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> --}}
    <link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.min.css') }}">
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- custom-css --}}
    <link rel="stylesheet" href="{{ asset('backend/custom_css/custom.css') }}">

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('backend/js/ace-extra.min.js') }}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('backend/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('backend/js/respond.min.js') }}"></script>
    <![endif]-->
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

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{ asset('backend/js/jquery-2.1.4.min.js') }}"></script>

    <!-- <![endif]-->

    <!--[if IE]>
    <script src="{{ asset('backend/js/jquery-1.11.3.min.js') }}"></script>
    <![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='{{ asset('backend/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
    </script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
    <script src="{{ asset('backend/js/excanvas.min.js') }}"></script>
    <![endif]-->
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
    {{-- <script src="{{ asset('backend/js/sweetalert2.all.min.js') }}"></script> --}}
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
        // $("#fontawesome").iconpicker();
    </script>
    {{-- <script>
        $('.date-picker').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd',
            viewMode: "days",
            minViewMode: "days",
        })
    </script> --}}

    {{-- Datepicker --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="{{ asset('/backend/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datepicker").datepicker({
                dateFormat: 'd M, yy'
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

    <script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('frontend/js/lottie-player.js') }}"></script>



    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $('.easy-pie-chart.percentage').each(function() {
                var $box = $(this).closest('.infobox');
                var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css(
                    'color') : 'rgba(255,255,255,0.95)');
                var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' :
                    '#E2E2E2';
                var size = parseInt($(this).data('size')) || 50;
                $(this).easyPieChart({
                    barColor: barColor,
                    trackColor: trackColor,
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: parseInt(size / 10),
                    animate: ace.vars['old_ie'] ? false : 1000,
                    size: size
                });
            })

            $('.sparkline').each(function() {
                var $box = $(this).closest('.infobox');
                var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
                $(this).sparkline('html', {
                    tagValuesAttribute: 'data-values',
                    type: 'bar',
                    barColor: barColor,
                    chartRangeMin: $(this).data('min') || 0
                });
            });


            //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
            //but sometimes it brings up errors with normal resize event handlers
            $.resize.throttleWindow = false;

            var placeholder = $('#piechart-placeholder').css({
                'width': '90%',
                'min-height': '150px'
            });
            var data = [{
                    label: "social networks",
                    data: 38.7,
                    color: "#68BC31"
                },
                {
                    label: "search engines",
                    data: 24.5,
                    color: "#2091CF"
                },
                {
                    label: "ad campaigns",
                    data: 8.2,
                    color: "#AF4E96"
                },
                {
                    label: "direct traffic",
                    data: 18.6,
                    color: "#DA5430"
                },
                {
                    label: "other",
                    data: 10,
                    color: "#FEE074"
                }
            ]

            function drawPieChart(placeholder, data, position) {
                $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt: 0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne",
                        labelBoxBorderColor: null,
                        margin: [-30, 15]
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                })
            }
            drawPieChart(placeholder, data);

            /**
             we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
            so that's not needed actually.
            */
            placeholder.data('chart', data);
            placeholder.data('draw', drawPieChart);


            //pie chart tooltip example
            var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo(
                'body');
            var previousPoint = null;

            placeholder.on('plothover', function(event, pos, item) {
                if (item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({
                        top: pos.pageY + 10,
                        left: pos.pageX + 10
                    });
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }

            });

            /////////////////////////////////////
            $(document).one('ajaxloadstart.page', function(e) {
                $tooltip.remove();
            });




            var d1 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d1.push([i, Math.sin(i)]);
            }

            var d2 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d2.push([i, Math.cos(i)]);
            }

            var d3 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.2) {
                d3.push([i, Math.tan(i)]);
            }


            var sales_charts = $('#sales-charts').css({
                'width': '100%',
                'height': '220px'
            });
            $.plot("#sales-charts", [{
                    label: "Domains",
                    data: d1
                },
                {
                    label: "Hosting",
                    data: d2
                },
                {
                    label: "Services",
                    data: d3
                }
            ], {
                hoverable: true,
                shadowSize: 0,
                series: {
                    lines: {
                        show: true
                    },
                    points: {
                        show: true
                    }
                },
                xaxis: {
                    tickLength: 0
                },
                yaxis: {
                    ticks: 10,
                    min: -2,
                    max: 2,
                    tickDecimals: 3
                },
                grid: {
                    backgroundColor: {
                        colors: ["#fff", "#fff"]
                    },
                    borderWidth: 1,
                    borderColor: '#555'
                }
            });


            $('#recent-box [data-rel="tooltip"]').tooltip({
                placement: tooltip_placement
            });

            function tooltip_placement(context, source) {
                var $source = $(source);
                var $parent = $source.closest('.tab-content')
                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $source.offset();
                //var w2 = $source.width();

                if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
                return 'left';
            }


            $('.dialogs,.comments').ace_scroll({
                size: 300
            });


            //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
            //so disable dragging when clicking on label
            var agent = navigator.userAgent.toLowerCase();
            if (ace.vars['touch'] && ace.vars['android']) {
                $('#tasks').on('touchstart', function(e) {
                    var li = $(e.target).closest('#tasks li');
                    if (li.length == 0) return;
                    var label = li.find('label.inline').get(0);
                    if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
                });
            }

            $('#tasks').sortable({
                opacity: 0.8,
                revert: true,
                forceHelperSize: true,
                placeholder: 'draggable-placeholder',
                forcePlaceholderSize: true,
                tolerance: 'pointer',
                stop: function(event, ui) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                    $(ui.item).css('z-index', 'auto');
                }
            });
            $('#tasks').disableSelection();
            $('#tasks input:checkbox').removeAttr('checked').on('click', function() {
                if (this.checked) $(this).closest('li').addClass('selected');
                else $(this).closest('li').removeClass('selected');
            });


            //show the dropdowns on top or bottom depending on window height and menu position
            $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
                var offset = $(this).offset();

                var $w = $(window)
                if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                    $(this).addClass('dropup');
                else $(this).removeClass('dropup');
            });

        })


        // include swal for delete popup box
        @if (session()->get('message'))
            swal.fire({
                title: "Success",
                html: "<b>{{ session()->get('message') }}</b>",
                type: "success",
                timer: 1000
            });
        @elseif (session()->get('arpMassage'))
            swal.fire({
                // title: "Success",
                html: "<h4><b>{!! session()->get('arpMassage') !!}</b></h4><br><b>Work Order Generated Successfully.</b>",
                type: "success",
                timer: 9000
            });
        @elseif (session()->get('yarn-transfer-success'))
            swal.fire({
                // title: "Success",
                html: "<h4><b>{!! session()->get('yarn-transfer-success') !!}</b></h4><br><b>Yarn Transfer Generated Successfully.</b>",
                type: "success",
                timer: 9000
            });
        @elseif (session()->get('message-number'))
            swal.fire({
                title: "Success",
                html: "<b>{!! session()->get('message-number') !!}</b>",
                // type: "success",
                timer: 30000
            });
        @elseif (session()->get('error'))
            swal.fire({
                title: "Error",
                html: "<b>{{ session()->get('error') }}</b>",
                type: "error",
                timer: 1000
            });
        @elseif (session()->get('payment-success'))
            swal.fire({
                title: "Payment Success",
                html: "<b>{{ session()->pull('payment-success') }}</b>",
                type: "success",
                timer: 10000
            });
        @elseif (session()->get('payment-fail'))
            swal.fire({
                title: "Payment Failed",
                html: "<b>{{ session()->pull('payment-fail') }}</b>",
                type: "Error",
                timer: 10000
            });
        @endif
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
