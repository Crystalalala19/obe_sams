$(document).ready(
	function() {
		// Initializiation
		var stepCounter = 1;

		// Change the value here with the number of steps
		var totalStepCount = 3;

		// Disable everything
		// You may add additional DOM elements to disable here
		$("#step-1 select, #step-1 input, #step-1 textarea," +
			"#step-2 select, #step-2 input, #step-2 textarea," +
			"#step-3 select, #step-3 input, #step-3 textarea"
			).attr("disabled", "disabled");
		$("#step-1 button, #step-2 button, #step-3 button").addClass("disabled");

		// Check if this is currently the first step (button initialization)
		if(stepCounter === 1) {
			$("#btnNext").removeClass("disabled");

			// Enable first step
			$("#step-" + stepCounter + " select, #step-" + stepCounter + " input, #step-" + stepCounter + " textarea").removeAttr("disabled");
		}

		$("#btnNext").click(
			function(e) {
				// You may add checking here
				// if() {
					//-- Check here if input/selection is valid...

					// Disable previous step
					$("#step-" + stepCounter + " select, #step-" + stepCounter + " input, #step-" + stepCounter + " textarea").attr("disabled", "disabled");
					$("#step-" + stepCounter + " button").addClass("disabled");
					stepCounter++;

					// Check if last step, enable submit
					if(stepCounter === totalStepCount) {
						$("#btnNext").addClass("disabled");
						$("#btnSubmit").removeClass("disabled");
					}

					if(stepCounter !== 1) {
						$("#btnPrevious").removeClass("disabled");
					}

					// Enable next step
					$("#step-" + stepCounter + " select, #step-" + stepCounter + " input, #step-" + stepCounter + " textarea").removeAttr("disabled");
					$("#step-" + stepCounter +" button").removeClass("disabled");
				// } else {
					//-- Alert user of invalid input/selection...
				// }
			}
		);

		$("#btnPrevious").click(
			function(e) {
				// Disable previous step
				$("#step-" + stepCounter + " select, #step-" + stepCounter + " input, #step-" + stepCounter + " textarea").attr("disabled", "disabled");
				$("#step-" + stepCounter + " button").addClass("disabled");
				stepCounter--;

				if(stepCounter === 1) {
					$("#btnPrevious").addClass("disabled");
				}

				if(stepCounter < totalStepCount) {
					$("#btnNext").removeClass("disabled");
					$("#btnSubmit").addClass("disabled");
				}

				// Enable next step
				$("#step-" + stepCounter + " select, #step-" + stepCounter + " input, #step-" + stepCounter + " textarea").removeAttr("disabled");
				$("#step-" + stepCounter + " button").removeClass("disabled");
			}
		);
	}
);