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
                    <li class="active">Edit Course</li>
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
                                                    <i class="fa fa-plus-circle"></i> <span class="hide-in-sm">Edit Course</span>
                                                </h4>

                                                <span class="widget-toolbar">
                                                    <!--------------- Slider List---------------->
                                                    <a href="{{ route('prm.parade-courses.index') }}" class="">
                                                        <i class="fa fa-list"></i> Soldier Course <span class="hide-in-sm">List</span>
                                                    </a>
                                                </span>
                                            </div>


                                            <div class="widget-body">
                                                <div class="widget-main">

                                                    <form action="{{ route('prm.parade-courses.store') }}" id="Form"
                                                          method="post" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">

                                                            <!-- Soldier Name -->
                                                            <div class="col-sm-6">
                                                                <div align="left" class="form-group">
                                                                    <label>
                                                                        <h5><strong>Soldier<sup
                                                                                    class="text-danger">*</sup></strong>
                                                                        </h5>
                                                                    </label>
                                                                    <div>
                                                                        <select align="center" name="parade_id" class="form-control multiselect">
                                                                                <option value="{{ $parade->id }}">{{ $parade->name }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @include('pages.parade.add-multiple-course')

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
                                                        <div class="row">
                                                            <div class="col-sm-12" >
                                                                <div class="form-group table-responsive">
                                                                    <label class="tableTitle">

                                                                    </label>
                                                                    <table id="dynamic-table" class="table table-striped table-hover new-table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th class="blue font-weight-bold" width="40%">Course Name</th>
                                                                            <th class="text-center blue font-weight-bold" >Duration</th>
                                                                            <th class="text-center blue font-weight-bold" >Result</th>
                                                                            <th class="text-center blue font-weight-bold" >Remark</th>
                                                                            <th class="text-center blue font-weight-bold" >Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($coursesTaken as $courseTaken)
                                                                        <tr align="left">
                                                                            <td>{{ $courseTaken->course->name }}</td>
                                                                            <td class="text-center">{{ $courseTaken->duration }}</td>
                                                                            <td class="text-center">{{ $courseTaken->result }}</td>
                                                                            <td class="text-center">{{ $courseTaken->remark }}</td>
                                                                            <td class="text-center">
                                                                                <a onclick="viewStore(this)"
                                                                                   data-id="{{ $courseTaken->id }}"
                                                                                   data-name="{{ $courseTaken->course->name }}"
                                                                                   data-duration="{{ $courseTaken->duration }}"
                                                                                   data-result="{{ $courseTaken->result }}"
                                                                                   data-remark="{{ $courseTaken->remark }}"
                                                                                   role="button" class="btn btn-xs bs-tooltip"
                                                                                   style="background-color: limegreen !important; border: 1px solid limegreen !important;"
                                                                                   title="Edit">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <!-- The Modal -->
                                                                                <div id="myModal" class="modal">
                                                                                    <!-- Modal content -->
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <span class="close">&times;</span>
                                                                                            <div class="campName" id="campName">Course</div>
                                                                                            <input type="text" id="paradeCourseId" hidden>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                <div class="col-10">
                                                                                                    <table id="storeList">

                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="modal-footer">
                                                                                            <div align="center">
                                                                                                <button type="button" class="btn" style="background-color: #00BE67 !important; color: white !important; border: none;" onclick="updateCourse()">Update</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Modal work end-->


                                                                                <button type="button"
                                                                                        onclick="delete_item(`{{ route('prm.parade-courses.destroy', $courseTaken->id) }}`)"
                                                                                        class="btn btn-xs bs-tooltip"
                                                                                        style="background-color: #ff0084 !important; border: 1px solid #ff0084 !important;"
                                                                                        title="Delete">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
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



    <script>
        function viewStore(element) {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var callButton = document.getElementById("storeId");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            /*callButton.onclick = function() {
                modal.style.display = "block";
            }*/
            modal.style.display = "block";

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            let course_id = $(element).attr("data-id");
            let nameOfCourse = $(element).attr("data-name");
            let duration = $(element).attr("data-duration");
            let result = $(element).attr("data-result");
            let remark = $(element).attr("data-remark");
            document.getElementById('campName').innerHTML = ""+nameOfCourse;
            document.getElementById('paradeCourseId').value = course_id;



            $('#storeList').empty();
            $('#storeList').append("" +
                "<tr>\n" +
                "                                                                                    <th>Duration</th>\n" +
                "                                                                                    <th>Result</th>\n" +
                "                                                                                    <th>Remark</th>\n" +
                "                                                                                </tr>");

                $('#storeList').append("<tr>\n" +
                    "                                                                                                            <td class='text-left'><input type=\"text\" value=\""+duration+"\" id='duration' name=\"\"></td>\n" +
                    "                                                                                                            <td class='text-left'><input type=\"text\" value=\""+result+"\" id='result' name=\"\"></td>\n" +
                    "                                                                                                            <td class='text-left'><input type=\"text\" value=\""+remark+"\" id='remark' name=\"\"></td>\n" +
                    "                                                                                                        </tr>");


        }
        function updateCourse() {
            let paradeCourseID = document.getElementById('paradeCourseId').value;
            let duration = document.getElementById('duration').value;
            let result = document.getElementById('result').value;
            let remark = document.getElementById('remark').value;
            let url = "/update_course";
            let allData = {ParadeCourseID:paradeCourseID, Duration:duration, Result:result, Remark:remark};
            axios.post(url, allData).then(function (response) {
                location.reload();
            }).catch(function (error) {
                location.reload();
            })
        }
    </script>
@endsection


