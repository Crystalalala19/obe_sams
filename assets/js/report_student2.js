$('#program_ajax').change(function() {
    var selectedValue = this.value;

    if(selectedValue == '') {
        $("#program_ajax2 option").remove();
        $("#program_ajax2").html('<option value="" selected="selected">Select a Course:</option>');
    }
    else {
        $.ajax({
            url: baseurl+'admin/programCourses_ajax',
            type: 'post',
            data: {option2: selectedValue},
            dataType: 'json',
            success: function(response) {
                $("#program_ajax2 option").remove();
                if(jQuery.isEmptyObject(response)) {
                    $("#program_ajax2").html('<option value="">No records found.</option>');
                }
                else {
                    var toAppend = "<option value='' selected='selected'>Select Courses:</option><option value='all'>All</option>";
                    $.each(response, function(key, value) {
                        toAppend += "<option value="+value.CourseCode+">"+value.CourseCode+"</option>";
                    });

                    $('#program_ajax2').append(toAppend);
                }
                // For console debugging
                // console.log(response);
            }
        });
    }
});