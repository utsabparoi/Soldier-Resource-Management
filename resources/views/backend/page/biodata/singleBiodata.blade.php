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
                    <li class="active">Biodata</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Biodata of Mr. X  </span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('website.biodata.index') }}" class="">
                                                    <i class="fa fa-list"></i> Person <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main" style="padding-left: 210px;">
                                                    <div class="row">
                                                        <div class="col-lg-4" style="margin-top: 22px;">
                                                            <div style="border: 1px solid #a3a3a3; width: 50%; padding-left: 8px;">
                                                            <span><h5><strong>Present Loc: {{$employee->present_location}}</strong></h5></span>
                                                            <span><h5><strong>Last Lve: 12/12/2022</strong></h5></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4" style="margin-top: 22px;">
                                                            <span><h3><strong><u style="text-underline-offset: 0.3em;">BIO DATA-JCO/OR</u></strong></h3></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <img src="{{ asset($employee->image) }}" width="110px" height="110px">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <table border="1" width="80%" style="font-size: 17px;">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">1.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Person Name:</td>
                                                                    <td width="76%" style="padding-left: 5px;"> {{$employee->name}} </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">2.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Person Location:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->present_location}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">3.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of Join in Present Unit:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->join_date_present_unit}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">4.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of enrolment:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->enrolment_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">5.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of Present Rk:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->present_rank_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">6.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of Retirement:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->retirement_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">7.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Civ Edn:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->civ_edn}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">8.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Med Cat</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->med_cat}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">9.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Qual/Unqual of Next Rk:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->next_rank}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">10.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Perm Address:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->permanent_address}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">11.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Marital Status:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->marital_status}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">12.</td>
                                                                    <td width="20%" style="padding-left: 5px;">No of Children:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$employee->children_number}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="">13.</td>
                                                                    <td width="20%" style="">Course:</td>
                                                                    <td width="76%" style="">
                                                                    <table width="100%">
                                                                        <thead>
                                                                        <tr>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>Name of Course</strong></td>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>Result</strong></td>
                                                                            <td  class="text-left" style=""><strong>Remarks</strong></td>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        <tr>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
{{--                                                                                @foreach($allCourses as $allCourse)--}}
{{--                                                                                    @if($allCourse->id == $course->course_id)--}}
{{--                                                                                        {{ $allCourse->name }}--}}
{{--                                                                                    @else--}}
{{--                                                                                        <strong>No  enrolment course yet</strong>--}}
{{--                                                                                    @endif--}}
{{--                                                                                @endforeach--}}
                                                                                ARMY COMMANDO COURSE
                                                                            </td>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">A+</td>
                                                                            <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">Excelent</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
                                                                                {{--                                                                                @foreach($allCourses as $allCourse)--}}
                                                                                {{--                                                                                    @if($allCourse->id == $course->course_id)--}}
                                                                                {{--                                                                                        {{ $allCourse->name }}--}}
                                                                                {{--                                                                                    @else--}}
                                                                                {{--                                                                                        <strong>No  enrolment course yet</strong>--}}
                                                                                {{--                                                                                    @endif--}}
                                                                                {{--                                                                                @endforeach--}}
                                                                                BOMB & IED DISPOSAL COURSE
                                                                            </td>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">A</td>
                                                                            <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">Good</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
                                                                                {{--                                                                                @foreach($allCourses as $allCourse)--}}
                                                                                {{--                                                                                    @if($allCourse->id == $course->course_id)--}}
                                                                                {{--                                                                                        {{ $allCourse->name }}--}}
                                                                                {{--                                                                                    @else--}}
                                                                                {{--                                                                                        <strong>No  enrolment course yet</strong>--}}
                                                                                {{--                                                                                    @endif--}}
                                                                                {{--                                                                                @endforeach--}}
                                                                                DRILL INSTRUCTOR COURSE
                                                                            </td>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">A</td>
                                                                            <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">Good</td>
                                                                        </tr>


                                                                        </tbody>
                                                                    </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" width="4%" style="">14.</td>
                                                                    <td width="20%" style="">Punishment Details:</td>
                                                                    <td width="76%" style="">
                                                                        <table width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>No of Punishment</strong></td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>BAA Section</strong></td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>Description Offence</strong></td>
                                                                                <td  class="text-left" style=""><strong>Type of Punishment</strong></td>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                                <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">-</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">15.</td>
                                                                    <td width="20%" style="padding-left: 5px;">APR of Last 3Yrs:</td>
                                                                    <td width="76%" style="padding-left: 5px;">2020- <br> 2021- <br> 2022-</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">16.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Paid Leave:</td>
                                                                    <td width="76%" style="padding-left: 5px;"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div align="right" class="row"  style=" margin-right: 19%; margin-left: 20%;">
                                                        <div class="col-sm-12">
                                                            <a href="{{ route('website.biodata.index') }}">
                                                            <button class="btn btn-primary" type="submit" id="uploadPercent" onclick="PrintCourse()">
                                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                                Save
                                                            </button>
                                                            </a>
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
                $(document).ready(function () {
                    var counter = 0;
                    $(document).on("click",".addEventCourse", function(){
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

                    $(document).on("click",".removeEventCourse", function(event){
                        $(this).closest(".remove_able_tr_course").remove();
                        counter -= 1;
                    });
                });
            </script>

            <script>
                $(document).ready(function () {
                    var counter = 0;
                    $(document).on("click",".addEventPunishment", function(){
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

                    $(document).on("click",".removeEventPunishment", function(event){
                        $(this).closest(".remove_able_tr_punishment").remove();
                        counter -= 1;
                    });
                });
            </script>
@endsection
