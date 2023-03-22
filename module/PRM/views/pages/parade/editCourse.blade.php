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
                    <li class="active">Edit Course</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Edit Course of {{ $parade->name }}</span>
                                                </h4>

                                            </div>

                                            <form action="{{ route('prm.parade.update', $parade->id) }}" method="post" enctype="multipart/form-data" id="Form">
                                                @csrf
                                                @method('PUT')
                                                <div class="widget-body">
                                                    <div class="widget-body">
                                                        <div class="widget-main">
                                                            <div id="fuelux-wizard-container">
                                                                <div>
                                                                    <ul class="steps">
                                                                        <li data-step="1">
                                                                            <span class="step">1</span>
                                                                            <span class="title">Basic Information</span>
                                                                        </li>

                                                                        <li data-step="2" class="active">
                                                                            <span class="step">2</span>
                                                                            <span class="title">Course & Training</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <hr />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <br>
                                                        <div class="col-sm-12">
                                                            <div align="center" class="row" style="border: 1px solid #d0d0d0; margin-right: 2%; margin-left: 2%;">
                                                                <div align="center" class="col-xs-12">
                                                                    <div align="left"><label class="control-label no-padding-right" for="form-field-1"> <h4><strong>Add Course</strong></h4> </label></div>
                                                                    <div class="form-group">
                                                                        <table class="table" width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <th width="40%">Name of Course</th>
                                                                                <th width="10%">Resut</th>
                                                                                <th width="10%">Remarks</th>
                                                                                <th width="10%">Duration</th>
                                                                                <th width="5%"></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="table_body_course">
                                                                            @foreach($coursesTaken as $courseTaken)
                                                                            <tr class="remove_able_tr_course">
                                                                                <td>
                                                                                    <select class="col-xs-12 col-sm-12" name="course[]" id="course">
                                                                                        <option>{{ $courseTaken->course->name }}</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" value="{{ $courseTaken->result }}" name="course_result[]" id="">
                                                                                    <input type="text" value="{{ $courseTaken->id }}" name="course_id[]" hidden>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" value="{{ $courseTaken->remark }}" name="course_remark[]" id="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" value="{{ $courseTaken->duration }}" name="course_duration[]" id="">
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button" onclick="delete_item(`{{ route('prm.parade-courses.destroy', $courseTaken->id) }}`)" class="" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach

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
                                                            <div align="center" class="row" style="border: 1px solid #d0d0d0; margin-right: 2%; margin-left: 2%;">
                                                                <div align="center" class="col-xs-12">
                                                                    <div align="left"><label class="control-label no-padding-right" for="form-field-1"> <h4><strong>Add Training</strong></h4> </label></div>

                                                                    <div class="form-group">
                                                                        <table class="table" width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <th width="40%">Name of Training</th>
                                                                                <th width="10%">Resut</th>
                                                                                <th width="10%">Remarks</th>
                                                                                <th width="10%">Duration</th>
                                                                                <th width="5%"></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody class="table_body_training">
                                                                            @foreach($trainingsTaken as $trainingTaken)
                                                                            <tr class="remove_able_tr_training">
                                                                                <td>
                                                                                    <select class="col-xs-12 col-sm-12" name="training[]">
                                                                                         <option>{{ $trainingTaken->training->name }}</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" value="{{ $trainingTaken->result }}" name="training_result[]" id="">
                                                                                    <input type="text" value="{{ $trainingTaken->id }}" name="training_id[]" hidden>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" value="{{ $trainingTaken->remark }}" name="training_remark[]" id="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" value="{{ $trainingTaken->duration }}" name="training_duration[]" id="">
                                                                                </td>
                                                                                <td>
                                                                                    <button type="button" onclick="delete_item(`{{ route('prm.parade-training.destroy', $trainingTaken->id) }}`)" class="" style="background-color: white; border: none"><h4><i class="fa fa-minus-circle" style="color: #ff3636;"></i></h4></button>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach

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
                                                    <div align="right" class="row" style=" margin-right: 1.1%; margin-left: 25%;">
                                                        <div  class="col-sm-12">
                                                            <button class="btn" onclick="deleteImage()" style="background-color: #828282 !important; border: none;">
                                                                <i class="ace-icon fa fa-arrow-left bigger-110"></i>
                                                                Back
                                                            </button>
                                                            <button class="btn btn-primary" type="submit" name="submitButton" value="updateCourseTraining" style="background-color: #431cff !important; border: none;">
                                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                                Update
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
                                                                                            @foreach($coursesNotTaken as $courseNotTaken)
                    <option>{{ $courseNotTaken->name }}</option>
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
                                                                                            @foreach($trainingsNotTaken as $trainingNotTaken)
                    <option>{{ $trainingNotTaken->name }}</option>
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


        <script>
            function deleteImage() {
                axios.get('/clear_image').then(function (response) {
                    history.back();
                }).catch(function (error) {
                    history.back();
                })
            }
        </script>
@endsection

