@extends('backend.layout.app')
@section('title', 'Course')
@section('css')

@endsection
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Assing Course</li>
                </ul><!-- /.breadcrumb -->
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Assign Course</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('prm.parade-courses.index') }}" class="">
                                                        <i class="fa fa-list"></i> Parade Course <span class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('prm.parade-courses.store') }}" id="Form"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">

                                                            <!-- Parade Name -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Parade<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select align="center" name="parade_id"
                                                                            class="form-control multiselect" onchange="loadUnmatchedCourse(this)">
                                                                            <option value="">-Select a Parade-</option>
                                                                            @foreach ($parades as $parade)
                                                                                <option value="{{ $parade->id }}">{{ $parade->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6" >
                                                                <div class="form-group table-responsive">
                                                                    <label class="tableTitle">

                                                                    </label>
                                                                    <table id="dynamic-table" class="table table-striped table-hover new-table showTable">
                                                                        {{-- Table data receive from script file --}}
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        {{-- @include('pages.parade-course.add-multiple-course') --}}
                                                        {{-- <div class="row">
                                                            <!-- Course -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Course <sup
                                                                                    class="text-danger">*</sup><small class="text-success">(below course/'s not take yet)</small></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select name="course_id"
                                                                            class="form-control multiselect unmatched-course">
                                                                            <option value="">-First Select a Parade-</option>
                                                                            @foreach ($courses as $course)
                                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Duration <small class="red">(In month)</small></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control box-resize" type="text" name="duration">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Result</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control box-resize" type="text" name="result">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5>
                                                                            <strong>Remark</strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control box-resize" type="text" name="remark">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br> --}}
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div align="center" class="row" style="border: 1px solid #d0d0d0; margin-right: 2px; margin-left: 2px;">
                                                                    <div align="center" class="col-xs-12">
                                                                        <div align="left"><label class="control-label no-padding-right" for="form-field-1">
                                                                                <h4><strong>Add New Course</strong></h4>
                                                                            </label></div>
                                                                        <div class="form-group">
                                                                            <table class="table" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="20%">Not Yet Course</th>
                                                                                        <th width="10%">Resut</th>
                                                                                        <th width="10%">Remarks</th>
                                                                                        <th width="10%">Duration</th>
                                                                                        <th width="10%">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="table_body_course">
                                                                                    <tr class="remove_able_tr_course">
                                                                                        <td>
                                                                                            <select class="col-xs-12 col-sm-12 multiselect unmatched-course" name="course[]" id="course">
                                                                                                <option value="notSelect">-First Select a Parade -</option>
                                                                                                @foreach ($courses as $course)
                                                                                                    <option>{{ $course->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control box-resize" name="course_result[]" id="">
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control box-resize" name="course_remark[]" id="">
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control box-resize" name="course_duration[]" id="">
                                                                                        </td>
                                                                                        <td>
                                                                                            <button type="button" class="removeEventCourse"
                                                                                                style="background-color: white; border: none">
                                                                                                <h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>

                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td>
                                                                                            <button type="button" class="addEventCourse"
                                                                                                style="background-color: white; border: none">
                                                                                                <h4><i class="fa fa-plus-circle" style="color: #00ff73;"></i></h4>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div class="form-group">
                                                            <!-- Add Page -->
                                                            <h5 class="widget-title">
                                                                <div class="row"
                                                                    style="margin-top: 10px;padding:5px">
                                                                    <div class="col-md-12 text-center pr-2">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-sm btn-block"
                                                                            style="max-width: 150px">
                                                                            <i class="fa fa-save"></i> Assign
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="space-10"></div>
                                                            </h5>
                                                        </div>

                                                    </form>
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
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('backend/css/custom-style.css') }}" />

    <script>
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addEventCourse", function() {
                var whole_extra_item_add = `<tr class="remove_able_tr_course">
                                                                                    <td>
                                                                                        <select class="col-xs-12 col-sm-12 multiselect unmatched-course" name="course[]">
                                                                                            <option>-Select-</option>
                                                                                            @foreach ($courses as $course)
                    <option>{{ $course->name }}</option>
                                                                                            @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control box-resize" name="course_result[]" id="">
                </td>
                <td>
                    <input type="text" class="form-control box-resize" name="course_remark[]" id="">
                </td>
                <td>
                    <input type="text" class="form-control box-resize" name="course_duration[]" id="">
                </td>
                <td>
                    <button type="button" class="removeEventCourse" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
                </td>
            </tr>`;
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
@endsection

@section('js')
    @include('pages.parade-course._include.script');
@endsection

