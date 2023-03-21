{{-- This function get those courses which are not take yet --}}
<script>
    loadUnmatchedCourse();
    function loadUnmatchedCourse() {
        let paradeId = {{ $parade->id }};

        let course_name = $('.unmatched-course').empty();
        course_name.append('<option value="">-Select a Course-</option>');

        $.get("/prm/get-unmatched-course", {
            parade_id: paradeId
        }, function(data, status) {
            $(data).each(function(index, item) {
                course_name.append('<option value="' + item.id + '">' + item.name + '</option>')
            });
        });

        let table_title = $('.tableTitle').empty();
        table_title.append('<h5>Taken Course List</h5>');

        let table_info = $('.showTable').empty();
        table_info.append("<thead>\n" +
                        "                                                                            <tr>\n" +
                        "                                                                                <th class=\"blue font-weight-bold\" width=\"40%\">Course Name</th>\n" +
                        "                                                                                <th class=\"text-center blue font-weight-bold\" >Duration</th>\n" +
                        "                                                                                <th class=\"text-center blue font-weight-bold\" >Result</th>\n" +
                        "                                                                                <th class=\"text-center blue font-weight-bold\" >Remark</th>\n" +
                        "                                                                                <th class=\"text-center blue font-weight-bold\" >Action</th>\n" +
                        "                                                                            </tr>\n" +
                        "                                                                        </thead>");

        $.get("/prm/get-taken-course", { parade_id: paradeId }, function(data, status) {
            // console.log(data);
            $(data).each(function(index, item) {
                table_info.append("                                                                        <tbody>\n" +
                    "" +
                            "<tr align=\"left\">\n" +
                            "                                                                                    <td >" +
                            item.course.name + "</td>\n" +
                            "                                                                                    <td class=\"text-center\">" +
                            item.duration + "</td>\n" +
                            "                                                                                    <td class=\"text-center\">" +
                            item.result + "</td>\n" +
                            "                                                                                    <td class=\"text-center\">" +
                            item.remark + "</td>\n" +
                            "                                                                                     <td class=\"text-center\">" +
                            '<button onclick="delete_item(`{{ route('prm.parade-courses.destroy', $parade->id ) }}`)" class="btn btn-xs bs-tooltip" style="background-color: #ff0084 !important; border: 1px solid #ff0084 !important;"><i class="fa fa-trash"></i></button>' + "</td>\n" +
                            "                                                                                </tr>"+
                        "\n" +
                        "                                                                        </tbody>");
            });
        });
    }
</script>
