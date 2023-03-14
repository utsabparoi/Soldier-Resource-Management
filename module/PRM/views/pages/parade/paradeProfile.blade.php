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
                    <li class="active">Soldier</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Soldier Profile </span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('prm.parade.index') }}" class="">
                                                    <i class="fa fa-list"></i> Soldier <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main" style="padding-left: 210px;">
                                                    <div class="row">
                                                        <div class="col-lg-4" style="margin-top: 22px;">
                                                            <div style="border: 1px solid #a3a3a3; width: 50%; padding-left: 8px;">
                                                            <span><h5><strong>Present Loc: {{ $location->camp->name }}</strong></h5></span>
                                                            <span><h5><strong>Last Lve: 12/12/2022</strong></h5></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4" style="margin-top: 22px;">
                                                            <span><h3><strong><u style="text-underline-offset: 0.3em;">BIO DATA-JCO/OR</u></strong></h3></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <img src="@if($parade->image) {{ asset($parade->image) }} @else {{ asset('backend/images/person.png') }} @endif" width="110px" height="110px">
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
                                                                    <td width="76%" style="padding-left: 5px;"> {{$parade->name}} </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">2.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Person Location:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{ $location->camp->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">3.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of Join in Present Unit:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->join_date_present_unit}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">4.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of enrolment:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->enrolment_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">5.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of Present Rk:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->present_rank_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">6.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Date of Retirement:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->retirement_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">7.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Civ Edn:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->civ_edn}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">8.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Med Cat</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->med_cat}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">9.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Qual/Unqual of Next Rk:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->next_rank}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">10.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Perm Address:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->permanent_address}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">11.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Marital Status:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->marital_status}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">12.</td>
                                                                    <td width="20%" style="padding-left: 5px;">No of Children:</td>
                                                                    <td width="76%" style="padding-left: 5px;">{{$parade->children_number}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="">13.</td>
                                                                    <td width="20%" style="">Course:</td>
                                                                    <td width="76%" style="">
                                                                    <table width="100%">
                                                                        <thead>
                                                                        <tr>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>&nbsp;Name of Course</strong></td>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>&nbsp; Result</strong></td>
                                                                            <td  class="text-left" style=""><strong>&nbsp; Remarks</strong></td>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        @forelse($courses as $course)
                                                                        <tr>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
                                                                                 &nbsp;{{ $course->course->name}}
                                                                            </td>
                                                                            <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">&nbsp; {{ $course->result}}</td>
                                                                            <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">&nbsp; {{ $course->remark}}</td>
                                                                        </tr>
                                                                        @empty
                                                                            <tr>
                                                                                <td colspan="30" class="text-center py-3"
                                                                                    style="font-size: 14px; border-right: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
                                                                                    <strong>No completed course!</strong>
                                                                                </td>
                                                                            </tr>
                                                                        @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="">14.</td>
                                                                    <td width="20%" style="">Training:</td>
                                                                    <td width="76%" style="">
                                                                        <table width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>&nbsp;Name of Training</strong></td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>&nbsp; Result</strong></td>
                                                                                <td  class="text-left" style=""><strong>&nbsp; Remarks</strong></td>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            @forelse($trainings as $training)
                                                                                <tr>
                                                                                    <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
                                                                                        &nbsp;{{ $training->training->name}}
                                                                                    </td>
                                                                                    <td  class="text-left" style="border-right: 1px solid #a1a1a1; border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">&nbsp; {{ $training->result}}</td>
                                                                                    <td  class="text-left" style="border-bottom: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">&nbsp; {{ $training->remark}}</td>
                                                                                </tr>
                                                                            @empty
                                                                                <tr>
                                                                                    <td colspan="30" class="text-center py-3"
                                                                                        style="font-size: 14px; border-right: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
                                                                                        <strong>No completed training!</strong>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforelse
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-left" width="4%" style="padding-left: 5px;"">15.</td>
                                                                    <td width="20%" style="">Punishment Details:</td>
                                                                    <td width="76%" style="">
                                                                        <table width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>&nbsp;No of Punishment</strong></td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>&nbsp; BAA Section</strong></td>
                                                                                <td  class="text-left" style="border-right: 1px solid #a1a1a1;"><strong>&nbsp; Description Offence</strong></td>
                                                                                <td  class="text-left" style=""><strong>&nbsp; Type of Punishment</strong></td>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td colspan="30" class="text-center py-3"
                                                                                    style="font-size: 14px; border-right: 1px solid #a1a1a1; border-top: 1px solid #a1a1a1;">
                                                                                    <strong>No punishment found!</strong>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">16.</td>
                                                                    <td width="20%" style="padding-left: 5px;">APR of Last 3Yrs:</td>
                                                                    <td width="76%" style="padding-left: 5px;">@foreach($aprs as $apr){{ $apr->annual_report }}<br> @endforeach</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center" width="4%" style="padding-left: 5px;">17.</td>
                                                                    <td width="20%" style="padding-left: 5px;">Last Leave:</td>
                                                                    <td width="76%" style="padding-left: 5px;">@if(isset($lastLeave->end_date)) {{ date('d M Y', strtotime($lastLeave->end_date)) }}, {{ $lastLeave->leave_category->name }} @else  @endif</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div align="right" class="row"  style=" margin-right: 19%; margin-left: 20%;">
                                                        <div class="col-sm-12">
                                                            <button class="btn" type="submit" style="background-color: #431cff !important; border: none;" id="uploadPercent" onclick="window.print()">
                                                                <i class="ace-icon fa fa-print bigger-110"></i>
                                                                Print
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
