var form = $("#step-form");

form.validate({
    errorPlacement: function errorPlacement(error, element) {
        element.before(error);
    }
});

form.children("div").steps({
    headerTag: "h2",
    bodyTag: "section",
    enableCancelButton: true,
    autoFocus: true,
    labels: {finish: "Submit"},
    onStepChanging: function(event, currentIndex, newIndex) {
        if (currentIndex > newIndex)
        {
            return true;
        }
        
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onCanceled: function (event) { 
        history.go(-1);
    },
    onFinishing: function(event, currentIndex) {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function(event, currentIndex) {
        form.submit();
        // alert("Submitted!");
    }
});