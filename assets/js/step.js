$(document).ready(function() {
    // Initializiation
    var stepCounter = 1;

    var totalStepCount = 3;

    $("#step-2, #step-3").hide();

    if(stepCounter === 1) {
        $("#btnNext").prop('disabled', false);
        $("#btnPrevious").prop('disabled', true);
    }

    $("#btnNext").click(function(e) {
        $("#step-" + stepCounter).hide();
        stepCounter++;

        if(stepCounter === totalStepCount) {
            $("#btnNext").prop('disabled', true);
        }

        if(stepCounter !== 1) {
            $("#btnPrevious").prop('disabled', false);
        }

        $("#step-" + stepCounter).show();
    });

    $("#btnPrevious").click(function(e){
        $("#step-" + stepCounter).hide();
        stepCounter--;

        if(stepCounter === 1) {
            $("#btnPrevious").prop('disabled', true);
        }

        if(stepCounter < totalStepCount) {
            $("#btnNext").prop('disabled', false);
        }

        $("#step-" + stepCounter).show();
    });
});