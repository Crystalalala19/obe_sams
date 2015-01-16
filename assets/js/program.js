$('#program_ajax').on('change', function() {
    var selectedValue = this.value;

    $.ajax({
        url: url,
        type: 'post',
        data: data,
        // dataType: 'json',
        success: function(response) {
            console.log(response);
        }
    });
});