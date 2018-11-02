$(document).ready(function() {
	$("#changeerror").css({
		"display" : "none"
	});
});

$(document).on("submit", "#changeForm", function(e) {
	var curr = $("#currPass").val();
	var newPass = $("#newPass").val();
	var confPass = $("#confNewPass").val();

	if(newPass != confPass) {
		$("#changeerror").removeClass("alert-success");
		$("#changeerror").addClass("alert-danger");
		$("#changeerror").text("New Password and Confirm Password do not match. Try again");
		$("#changeerror").css({
			"display" : "block"
		});
	} else {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		})

		e.preventDefault(); 
		var formData = {
			curr: curr,
			newPass: newPass
		};

		$.ajax (
		{
	        type: "POST",
	        url: "/password/change",
	        data: formData,
	        dataType: 'json',
	        success: function (data) {
	        	if(data == "success") {
					$("#changeerror").addClass("alert-success");
		        	$("#changeerror").removeClass("alert-danger");
		        	$("#changeerror").text("Password successfully changed!");
					$("#changeerror").css({
						"display" : "block"
					});
	        	} else if(data == "error") {
	        		$("#changeerror").removeClass("alert-success");
		        	$("#changeerror").addClass("alert-danger");
	        		$("#changeerror").text("Current Password incorrect.");
					$("#changeerror").css({
						"display" : "block"
					});
	        	}
	        },
	        error: function (data) {
	        	$("#changeerror").removeClass("alert-success");
		        $("#changeerror").addClass("alert-danger");
	            $("#changeerror").text("Server error. Please try again.");
				$("#changeerror").css({
					"display" : "block"
				});
	        }
	    });
	}
	return false;
});