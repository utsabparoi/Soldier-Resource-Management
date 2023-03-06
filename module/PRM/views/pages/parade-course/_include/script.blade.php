<script>
    function loadUnmatchedCourse(object) {

        let paradeId = $(object).val();
        // console.log(paradeId);

        let course_name = $('.unmatched-course').empty();
        course_name.append('<option value="">-Select a Course-</option>');

        $.get("/prm/get-unmatched-course", {parade_id: paradeId}, function (data, status) {
            // console.log(data);
            $(data).each(function (index, item) {
                course_name.append('<option value="' + item.id + '">' + item.name + '</option>')
            });

        });
    }
</script>
