{{-- This function get those courses which are not take yet --}}
<script>
    function loadCurrentCamp(object) {

        let paradeId = $(object).val();

        let camp_name = $('.current-camp').empty();
        // camp_name.append('<span>Not Assign yet</span>');

        $.get("/prm/get-current-camp", {
            parade_id: paradeId
        }, function(data, status) {
            // console.log(data);
            if (data == '') {
                camp_name.append('<span class="text-danger">This soldier not in a camp yet</span>')
            }else{
                $(data).each(function(index, item) {
                    camp_name.append('<h4 class="blue" style="margin:3px;">' + item.camp.name + '</h4>')
                });
            }

        });

    }
</script>
