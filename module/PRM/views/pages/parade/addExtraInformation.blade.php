@extends('backend.layout.app')
@section('title', 'Biodata')
@section('content')
    <div class="main-content" xmlns="http://www.w3.org/1999/html">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Course Assign</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Course Assign</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                <!--------------- Slider List---------------->
                                                <a href="{{ route('prm.parade.index') }}" class="">
                                                    <i class="fa fa-list"></i> Parade <span class="hide-in-sm">List</span>
                                                </a>
                                            </span>
                                            </div>

                                            <form action="{{ route('prm.parade.store') }}" method="post" enctype="multipart/form-data" id="Form">
                                                @csrf
                                                <input type="text" name="name" value="{{$profileData['Name']}}" hidden>
                                                <input type="text" name="presentLocation" value="{{$profileData['PresentLocation']}}" hidden>
                                                <input type="date" name="dateOfJoin" value="{{$profileData['DateOfJoin']}}" hidden>
                                                <input type="text" name="image" value="{{$profileData['Image']}}" style="display: none;" hidden>
                                                <input type="date" name="dateOfEnrolment" value="{{$profileData['DateOfEnrolment']}}" hidden>
                                                <input type="date" name="dateOfPresentRank" value="{{$profileData['DateOfPresentRank']}}" hidden>
                                                <input type="date" name="dateOfRetirement" value="{{$profileData['DateOfRetirement']}}" hidden>
                                                <input type="text" name="cidEdn" value="{{$profileData['CidEdn']}}" hidden>
                                                <input type="text" name="medCat" value="{{$profileData['MedCat']}}" hidden>
                                                <input type="text" name="qualUnqualRank" value="{{$profileData['QualUnqualRank']}}" hidden>
                                                <input type="text" name="permanentAddress" value="{{$profileData['PermanentAddress']}}" hidden>
                                                <input type="text" name="meritalStatus" value="{{$profileData['MeritalStatus']}}" hidden>
                                                <input type="text" name="noOfChildren" value="{{$profileData['NoOfChildren']}}" hidden>
                                                <div class="widget-body">
                                                        <div class="row">
                                                            <br>
                                                            <div class="col-sm-12">
                                                                <div align="center" class="row" style=" margin-right: 20%; margin-left: 20%;">
                                                                    <div align="center" class="col-xs-12">
                                                                        <div align="center"><label class="col-sm-12 control-label"><span style="font-size: 19px;"><strong>Add Additional Information for {{$profileData['Name']}} </strong></span> </label>
                                                                        </div>
                                                                        <div class="form-group">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>



                                                                <div align="center" class="row" style="border: 1px solid #d0d0d0; margin-right: 20%; margin-left: 20%;">
                                                                    <div align="center" class="col-xs-12">
                                                                        <div align="left"><label class="control-label no-padding-right" for="form-field-1"> <h4><strong>Add Course</strong></h4> </label></div>
                                                                        <div class="form-group">
                                                                            <table class="table" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th width="20%">Name of Course</th>
                                                                                    <th width="5%">Resut</th>
                                                                                    <th width="5%">Remarks</th>
                                                                                    <th width="5%">Duration</th>
                                                                                    <th width="5%">Action</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody class="table_body_course">
                                                                                <tr class="remove_able_tr_course">
                                                                                    <td>
                                                                                        <select class="col-xs-12 col-sm-12" name="course[]" id="course">
                                                                                            <option>-Select-</option>
                                                                                            @foreach($courses as $course)
                                                                                                <option>{{ $course->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" name="course_result[]" id="">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" name="course_remark[]" id="">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" name="course_duration[]" id="">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button type="button" class="removeEventCourse" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
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
                                                                                        <button type="button" class="addEventCourse" style="background-color: white; border: none"><h4><i class="fa fa-plus-circle" style="color: #00ff73;"></i></h4></button>
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
                                                        <div class="row">
                                                            <br>

                                                            <div class="col-sm-12">
                                                                <div align="center" class="row" style="border: 1px solid #d0d0d0; margin-right: 20%; margin-left: 20%;">
                                                                    <div align="center" class="col-xs-12">
                                                                        <div align="left"><label class="control-label no-padding-right" for="form-field-1"> <h4><strong>Add Training</strong></h4> </label></div>

                                                                        <div class="form-group">
                                                                            <table class="table" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th width="20%">Name of Training</th>
                                                                                    <th width="5%">Resut</th>
                                                                                    <th width="5%">Remarks</th>
                                                                                    <th width="5%">Duration</th>
                                                                                    <th width="5%">Action</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody class="table_body_training">
                                                                                <tr class="remove_able_tr_training">
                                                                                    <td>
                                                                                        <select class="col-xs-12 col-sm-12" name="training[]">
                                                                                            <option>-Select-</option>
                                                                                            @foreach($training as $trainings)
                                                                                                <option>{{ $trainings->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" name="training_result[]" id="">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" name="training_remark[]" id="">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" name="training_duration[]" id="">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button type="button" class="removeEventTraining" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
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
                                                                                        <button type="button" class="addEventTraining" style="background-color: white; border: none"><h4><i class="fa fa-plus-circle" style="color: #00ff73;"></i></h4></button>
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
                                                        <div align="right"class="row" style=" margin-right: 19.1%; margin-left: 20%;">
                                                            <div  class="col-sm-12">
                                                                <button class="btn btn-primary" type="submit" name="submitButton" value="saveWithExtraInfo" style="background-color: #431cff !important; border: none;">
                                                                    <i class="ace-icon fa fa-save bigger-110"></i>
                                                                    Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    <br>
                                                </div>
                                            </form>
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
        <link rel="stylesheet" href="{{ asset('backend/css/custom-style.css') }}" />

        <script>
            $(document).ready(function () {
                var counter = 0;
                $(document).on("click",".addEventCourse", function(){
                    var whole_extra_item_add = `<tr class="remove_able_tr_course">
                                                                                    <td>
                                                                                        <select class="col-xs-12 col-sm-12" name="course[]">
                                                                                            <option>-Select-</option>
                                                                                            @foreach($courses as $course)
                    <option>{{ $course->name }}</option>
                                                                                            @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="course_result[]" id="">
                </td>
                <td>
                    <input type="text" class="form-control" name="course_remark[]" id="">
                </td>
                <td>
                    <input type="text" class="form-control" name="course_duration[]" id="">
                </td>
                <td>
                    <button type="button" class="removeEventCourse" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
                </td>
            </tr>`;
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
                $(document).on("click",".addEventTraining", function(){
                    var whole_extra_item_add2 = `<tr class="remove_able_tr_training">
                                                                                    <td>
                                                                                        <select class="col-xs-12 col-sm-12" name="training[]">
                                                                                            <option>-Select-</option>
                                                                                            @foreach($training as $trainings)
                    <option>{{ $trainings->name }}</option>
                                                                                            @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="training_result[]" id="">
                </td>
                <td>
                    <input type="text" class="form-control" name="training_remark[]" id="">
                </td>
                <td>
                    <input type="text" class="form-control" name="training_duration[]" id="">
                </td>
                <td>
                    <button type="button" class="removeEventTraining" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
                </td>
            </tr>`;
                    // console.log(whole_extra_item_add);
                    $(".table_body_training").append(whole_extra_item_add2);
                    counter++;
                });

                $(document).on("click",".removeEventTraining", function(event){
                    $(this).closest(".remove_able_tr_training").remove();
                    counter -= 1;
                });
            });
        </script>
@endsection

