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
                                <th width="10%">Result</th>
                                <th width="10%">Remarks</th>
                                <th width="10%">Duration</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table_body_course">
                            <tr class="remove_able_tr_course">
                                <td>
                                    <select class="multiselect" name="course[]"
                                        id="course">
                                        <option value="notSelect">-Select-</option>
                                        @foreach ($coursesNotTaken as $courseNotTaken)
                                            <option value="{{ $courseNotTaken->id }}">{{ $courseNotTaken->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control box-resize" name="course_result[]"
                                        id="">
                                </td>
                                <td>
                                    <input type="text" class="form-control box-resize" name="course_remark[]"
                                        id="">
                                </td>
                                <td>
                                    <input type="text" class="form-control box-resize" name="course_duration[]"
                                        id="">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('backend/css/custom-style.css') }}" />

<script>
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addEventCourse", function() {
            var whole_extra_item_add =
                `<tr class="remove_able_tr_course">
                <td>
                    <select class="multiselect" name="course[]">
                        <option>-Select-</option>
                        @foreach ($coursesNotTaken as $courseNotTaken)
                            <option  value="{{ $courseNotTaken->id }}">{{ $courseNotTaken->name }}</option>
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
            $('.multiselect').select2();
            counter++;
        });

        $(document).on("click", ".removeEventCourse", function(event) {
            $(this).closest(".remove_able_tr_course").remove();
            counter -= 1;
        });
    });
</script>
