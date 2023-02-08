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
                    <li class="active">Leave Application</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Leave Application</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('website.biodata.index') }}" class="">
                                                    <i class="fa fa-list"></i> Leave Application <span
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
                                                                <label><h5><strong>Year<sup class="text-danger">*</sup></strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <select class="col-xs-10 col-sm-10">
                                                                        <option>-Select Year-</option>
                                                                        <option>2020</option>
                                                                        <option>2021</option>
                                                                        <option>2022</option>
                                                                        <option>2023</option>
                                                                        <option>2024</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Leave Type<sup
                                                                                class="text-danger">*</sup></strong>
                                                                    </h5></label>
                                                                <div>
                                                                    <select class="col-xs-10 col-sm-10">
                                                                        <option>-Leave Type-</option>
                                                                        <option>Privilege Leave</option>
                                                                        <option>Casual Leave</option>
                                                                        <option>Recreation Leave</option>
                                                                        <option>Maternity Leave</option>
                                                                        <option>Medical Leave</option>
                                                                        <option>Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-4">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>From - To<sup
                                                                                class="text-danger">*</sup></strong>
                                                                    </h5></label>
                                                                <div style="display: flex;">
                                                                    <input type="date" name="comanyName" id="comanyName"
                                                                           class="col-xs-10 col-sm-4">
                                                                    <span
                                                                        style="font-weight: bolder; font-size: 20px; background: #e5e5e5; border-top: 1px solid #d0d0d0; border-bottom: 1px solid #d0d0d0;">&#x21C6;</span>
                                                                    <input type="date" name="comanyName" id="comanyName"
                                                                           class="col-xs-10 col-sm-4">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-2">
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
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Emergency Phone</strong></h5></label>
                                                                <div>
                                                                    <input type="text" name="comanyName" id="comanyName"
                                                                           value="" class="col-xs-10 col-sm-10">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-6">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Contact Details</strong></h5></label>
                                                                <div>
                                                                    <input type="text" name="comanyName" id="comanyName"
                                                                           value="" class="col-xs-12 col-sm-12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Company Name -->
                                                        <div class="col-sm-3">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Attachment</strong></h5></label>
                                                                <div>
                                                                    <input type="file" name="comanyName" id="comanyName"
                                                                           value="" class="col-xs-10 col-sm-10">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <!-- Company Name -->
                                                        <div class="col-sm-12">
                                                            <div align="left" class="form-group">
                                                                <label><h5><strong>Reason</strong></h5></label>
                                                                <div>
                                                                    <textarea name="comanyName" id="comanyName" rows="5"
                                                                              class="col-xs-10 col-sm-12"></textarea>
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

                    $(document).on("click", ".removeEventCourse", function (event) {
                        $(this).closest(".remove_able_tr_course").remove();
                        counter -= 1;
                    });
                });
            </script>

            <script>
                $(document).ready(function () {
                    var counter = 0;
                    $(document).on("click", ".addEventPunishment", function () {
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

                    $(document).on("click", ".removeEventPunishment", function (event) {
                        $(this).closest(".remove_able_tr_punishment").remove();
                        counter -= 1;
                    });
                });
            </script>
@endsection
