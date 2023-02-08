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
                    <li class="active">Assign Course</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                           autocomplete="off"/>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Assign Course</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('website.biodata.index') }}" class="">
                                                    <i class="fa fa-list"></i> Assign Course <span
                                                        class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <div class="row">
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Company Name<sup class="text-danger">*</sup></strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <input type="text" name="comanyName" id="comanyName"
                                                                           value="Smart Software Ltd"
                                                                           class="col-xs-10 col-sm-10" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Department<sup
                                                                                class="text-danger">*</sup></strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <input type="text" name="comanyName" id="comanyName"
                                                                           value="Department"
                                                                           class="col-xs-10 col-sm-10" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Designation<sup
                                                                                class="text-danger">*</sup></strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <select class="col-xs-10 col-sm-10">
                                                                        <option>-Select Designation-</option>
                                                                        <option>Major</option>
                                                                        <option>Captain</option>
                                                                        <option>Senior Officer</option>
                                                                        <option>Officer</option>
                                                                        <option>Junior Officer</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Employee<sup
                                                                                class="text-danger">*</sup></strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <select class="col-xs-10 col-sm-10">
                                                                        <option>-Select Employee-</option>
                                                                        @foreach($employees as $employee)
                                                                            <option>{{ $employee->name }}</option>
                                                                        @endforeach
                                                                    </select></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Present Location</strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <input type="text" name="comanyName" id="comanyName"
                                                                           value="110/A Dhaka, Bangladesh"
                                                                           class="col-xs-10 col-sm-10" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Joining Date</strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <input type="text" name="comanyName" id="comanyName"
                                                                           value="10/12/2022"
                                                                           class="col-xs-10 col-sm-10" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Enrolment Date</strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <input type="text" name="comanyName" id="comanyName"
                                                                           value="18/01/2021"
                                                                           class="col-xs-10 col-sm-10" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Image</strong></h5></label>
                                                                <div>
                                                                    <img src="{{ asset('backend/images/person.png') }}"
                                                                         width="70px" height="70px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <!-- Company Name -->
                                                        <div class="col-sm-12">
                                                            <div align="left" class="form-group">
                                                                <div align="left"><label
                                                                        class="control-label no-padding-right"
                                                                        for="form-field-1"><h4><strong>Add
                                                                                Course</strong></h4></label></div>
                                                                <div class="form-group">
                                                                    <table class="table" width="100%">
                                                                        <thead>
                                                                        <tr>
                                                                            <th width="20%">Name of Course</th>
                                                                            <th width="5%">Resut</th>
                                                                            <th width="5%">Remarks</th>
                                                                            <th width="5%">Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody class="table_body_course">
                                                                        <tr class="remove_able_tr_course">
                                                                            <td>
                                                                                <select class="form-control">
                                                                                    <option>-Select-</option>
                                                                                    @foreach($courses as $course)
                                                                                        <option>{{ $course->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                       class="form-control"
                                                                                       name="details_result[]"
                                                                                       id="">
                                                                            </td>
                                                                            <td>
                                                                                <input type="text"
                                                                                       class="form-control"
                                                                                       name="details_remark[]"
                                                                                       id="">
                                                                            </td>
                                                                            <td>
                                                                                <button type="button"
                                                                                        class="btn btn-danger btn-sm removeEventCourse">
                                                                                    -
                                                                                </button>
                                                                            </td>
                                                                        </tr>

                                                                        </tbody>
                                                                        <tfoot>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>
                                                                                <button type="button"
                                                                                        class="btn btn-info btn-sm addEventCourse">
                                                                                    +
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div align="right" class="row">
                                                        <div class="col-sm-12">
                                                            <a href="/">
                                                                <button class="btn btn-primary" type="button"
                                                                        id="uploadPercent" \>
                                                                    <i class="ace-icon fa fa-save bigger-110"></i>
                                                                    Save
                                                                </button>
                                                            </a>
                                                            <button class="btn btn-grey" type="button"
                                                                    id="uploadPercent" \>
                                                                <i class="ace-icon fa fa-refresh bigger-110"></i>
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <br>
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
                $(document).ready(function () {
                    var counter = 0;
                    $(document).on("click", ".addEventCourse", function () {
                        var whole_extra_item_add = `<tr class="remove_able_tr_course">
                                                                                <td>
                                                                                    <select class="form-control">
                                                                                        <option>-Select-</option>
                                                                                        @foreach($courses as $course)
                        <option>{{ $course->name }}</option>
                                                                                        @endforeach
                        </select>
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
                </tr>`;
                        // console.log(whole_extra_item_add);
                        $(".table_body_course").append(whole_extra_item_add);
                        counter++;
                    });

                    $(document).on("click", ".removeEventCourse", function (event) {
                        $(this).closest(".remove_able_tr_course").remove();
                        counter -= 1;
                    });
                });
            </script>
@endsection
