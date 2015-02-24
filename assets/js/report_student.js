$('#program').change(function() {
    var selectedValue = this.value;

    if(selectedValue == '') {
        $("#program_ajax option").remove();
        $("#program_ajax").html('<option value="" selected="selected">Select a Program</option>');
    }
    else {
        $.ajax({
            url: baseurl+'admin/program_ajax',
            type: 'post',
            data: {option: selectedValue},
            dataType: 'json',
            success: function(response) {
                $("#program_ajax option").remove();
                if(jQuery.isEmptyObject(response)) {
                    $("#program_ajax").html('<option value="" selected="selected">No records found.</option>');
                }
                else {
                    var toAppend = "<option value='' selected='selected'>Select Effective Year:</option>";
                    $.each(response, function(key, value) {
                        toAppend += "<option value="+value.ID+">"+value.effective_year+" - "+ (parseInt(value.effective_year, 10) + 1)+"</option>";
                    });

                    $('#program_ajax').append(toAppend);
                }
                // For console debugging
                console.log(response);
            }
        });
    }
});