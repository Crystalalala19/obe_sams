$(document).ready(function() {
    // Initializiation
    var stepCounter = 1;

    var totalStepCount = 3;

    $("#btnNext, #btnPrevious").attr("disabled", "disabled");

    $("#btnSubmit, #step-2, #step-3").hide();

    if(stepCounter === 1) {
        $("#btnNext").removeAttr("disabled");
    }

    $("#btnNext").click(function(e) {
        $("#step-" + stepCounter).hide();
        stepCounter++;

        if(stepCounter === totalStepCount) {
            $("#btnNext").attr("disabled", "disabled");
            $("#btnSubmit").show();
        }

        if(stepCounter !== 1) {
            $("#btnPrevious").removeAttr("disabled");
        }

        $("#step-" + stepCounter).show();
    });

    $("#btnPrevious").click(function(e){
        $("#step-" + stepCounter).hide();
        stepCounter--;

        if(stepCounter === 1) {
            $("#btnPrevious").attr("disabled");
        }

        if(stepCounter < totalStepCount) {
            $("#btnNext").removeAttr("disabled");
            $("#btnSubmit").hide();
        }

        $("#step-" + stepCounter).show();
    });
});