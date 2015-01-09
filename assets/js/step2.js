$(document).ready(function() {
    // Initializiation
    var stepCounter = 1;

    var totalStepCount = 3;

    $("#btnSubmit, #step-2, #step-3").hide();

    if(stepCounter === 1) {
        $("#btnNext").removeClass("disabled");
    }

    $("#btnNext").click(function(e) {
        $("#step-" + stepCounter).hide();
        stepCounter++;

        if(stepCounter === totalStepCount) {
            $("#btnNext").addClass("disabled");
            $("#btnSubmit").show();
        }

        if(stepCounter !== 1) {
            $("#btnPrevious").removeClass("disabled");
        }

        $("#step-" + stepCounter).show();
    });

    $("#btnPrevious").click(function(e){
        $("#step-" + stepCounter).hide();
        stepCounter--;

        if(stepCounter === 1) {
            $("#btnPrevious").addClass("disabled");
        }

        if(stepCounter < totalStepCount) {
            $("#btnNext").removeClass("disabled");
            $("#btnSubmit").hide();
        }

        $("#step-" + stepCounter).show();
    });
});