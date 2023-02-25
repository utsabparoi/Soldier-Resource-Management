@extends('backend.layout.app')
@section('title', 'Biodata')
@section('css')

@endsection
@section('content')
    <div class="main-content" xmlns="http://www.w3.org/1999/html">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Add New Course</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                                autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
            {{-- main content start from here --}}
            <div class="page-content no-print">
                <div class="row">
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="page-content">
                                <div class="row p-20">
                                    <div class="col-12">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title">
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Add New
                                                        Course</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('website.biodata.index') }}" class="">
                                                        <i class="fa fa-list"></i> Course <span
                                                            class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <div class="row">
                                                        <br>

                                                        <div class="col-sm-12">
                                                            <div align="center" class="row">
                                                                <div align="center" class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label no-padding-right"
                                                                            for="form-field-1">
                                                                            <h5><strong>Course Name<sup
                                                                                        class="text-danger">*</sup></strong>
                                                                            </h5>
                                                                        </label>
                                                                        <input type="text" id="website" value=""
                                                                            size="60">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div align="center" class="row">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-primary" type="button"
                                                                id="uploadPercent" onclick="insertCourse()">
                                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- main content end  --}}
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

            <script>
                $(document).ready(function() {
                    var counter = 0;
                    $(document).on("click", ".addEventCourse", function() {
                        var whole_extra_item_add = `<tr class="remove_able_tr_course">
                                                                            <td>
                                                                                <input type="text" class="form-control" name="details_course_name[]" id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" name="details_result[]" id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" name="details_remark[]" id="">
                                                                            </td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-danger btn-sm removeEventCourse">-</button>
                                                                            </td>
                                                                        </tr>`
                        // console.log(whole_extra_item_add);
                        $(".table_body_course").append(whole_extra_item_add);
                        counter++;
                    });

                    $(document).on("click", ".removeEventCourse", function(event) {
                        $(this).closest(".remove_able_tr_course").remove();
                        counter -= 1;
                    });
                });
            </script>

            <script>
                $(document).ready(function() {
                    var counter = 0;
                    $(document).on("click", ".addEventPunishment", function() {
                        var whole_extra_item_add = `<tr class="remove_able_tr_punishment">
                                                                            <td>
                                                                                <input type="text" class="form-control" name="punishment_date[]" id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" name="punishment_baa_section[]" id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" name="punishment_offence[]" id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" name="punishment_type[]" id="">
                                                                            </td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-danger btn-sm removeEventPunishment">-</button>
                                                                            </td>
                                                                        </tr>`
                        // console.log(whole_extra_item_add);
                        $(".table_body_punishment").append(whole_extra_item_add);
                        counter++;
                    });

                    $(document).on("click", ".removeEventPunishment", function(event) {
                        $(this).closest(".remove_able_tr_punishment").remove();
                        counter -= 1;
                    });
                });
            </script>
        @endsection
