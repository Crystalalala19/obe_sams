$(document).ready(function() {
    // Initializiation
    var stepCounter = 1;

    var totalStepCount = 2;

    $("#btnSubmit").hide();
    $("#step-2").hide();

    if(stepCounter === 1) {
        $("#btnNext").removeClass("disabled");
        
    }

    $("#btnNext").click(function(e) {
        stepCounter++;

        if(stepCounter === totalStepCount) {
            $("#btnNext").addClass("disabled");
            $("#btnSubmit").show();
        }

        if(stepCounter !== 1) {
            $("#btnPrevious").removeClass("disabled");
        }

        $("#step-1").hide();
        $("#step-2").show();
    });

    $("#btnPrevious").click(function(e){
        stepCounter--;

        if(stepCounter === 1) {
            $("#btnPrevious").addClass("disabled");
        }

        if(stepCounter < totalStepCount) {
            $("#btnNext").removeClass("disabled");
            $("#btnSubmit").hide();
        }

        $("#step-2").hide();
        $("#step-1").show();
    });
});