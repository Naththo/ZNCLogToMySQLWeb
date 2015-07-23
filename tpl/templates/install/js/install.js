$(document).ready(function() {

	$("#retrystep").click(function() {
		window.location.reload();
	});

	$("#startbutton").click(function(e) {
		window.location.href = "?step=1";
	});

	$("#continuebutton").click(function(e) {
		newstep = step + 1;
		window.location.href = "?step=" + newstep;
	});

	var spinner = "";
	$("#dbinfo").submit(function(e) {
		var elements = ["#serverhost", "#username", "#password", "#dbname"];
		var credentials = {};
		for (var i = 0; i < elements.length; i++)
		{
			if ($(elements[i]).val().length == 0)
			{
				if (!$(elements[i]).parent().parent().hasClass("has-error"))
				{
					$(elements[i]).parent().parent().addClass("has-error");
				}
				empty++;
			}
			else
			{
				if ($(elements[i]).parent().parent().hasClass("has-error"))
				{
					$(elements[i]).parent().parent().removeClass("has-error");
				}
				credentials[elements[i].slice(1)] = $(elements[i]).val();
			}
		}

		if (Object.keys(credentials).length == 4)
		{
			if ($("#errbox").is(":visible"))
				$(this).hide();

			var opts = { lines: 7, length: 24, width: 14, radius: 42, scale: 1, corners: 1, color: '#000', opacity: 0.1, rotate: 0, direction: 1, speed: 1, trail: 60, fps: 20, zIndex: 2e9, className: 'spinner', top: '50%', left: '50%', shadow: false, hwaccel: false, position: 'absolute'};
			
			if (!spinner)
				spinner = new Spinner(opts).spin();
			$(".maincontent").append(spinner.el);

			$.ajax ({
				type: "POST",
				dataType: "json",
				url: "ajax.php",
				data: {step : step, credentials : credentials},
			}).done (function(data) {
				if (data["errors"])
				{
					spinner.stop();
					showError("Could not connect to database:", data["errors"]);
				} else if (data["success"]) {
					showSuccess();
				}
			});
		}
		return false;
	});
	
	$("#createuser").submit(function(e) {
		
		var elements = ["#username", "#password", "#confirmpassword", "#emailaddr"];
		var credentials = {};
		for (var i = 0; i < elements.length; i++)
		{
			if ($(elements[i]).val().length == 0)
			{
				if (!$(elements[i]).parent().parent().hasClass("has-error"))
				{
					$(elements[i]).parent().parent().addClass("has-error");
				}
			}
			else
			{
				if ($(elements[i]).parent().parent().hasClass("has-error"))
				{
					$(elements[i]).parent().parent().removeClass("has-error");
				}

				if ((elements[i] == "#password" || elements[i] == "#confirmpassword") && !$(elements[i]).parent().parent().hasClass("has-warning"))
				{
					if ($("#password").val() != $("#confirmpassword").val())
					{
						$(elements[i]).parent().parent().addClass("has-warning");
						continue;
					}
				}
				credentials[elements[i].slice(1)] = $(elements[i]).val();
			}
		}

		if (Object.keys(credentials).length == 4)
		{
			$.ajax ({
				type: "POST",
				dataType: "json",
				url: "ajax.php",
				data: {step : step, credentials : credentials},
			}).done (function(data) {
				if (data["errors"])
				{
					showError("Could not create the user", data["errors"]);
				} else if (data["success"]) {
					showSuccess();
				}
			});
		}
		return false;
	});

	move_step(step);

	function move_step(step)
	{
		console.log("step: "  + step);
		updateProgressBar(true);
		if (step == 2 || step == 4)
		{
			return;
		}

		$.ajax ({
			type: "POST",
			dataType: "json",
			url: "ajax.php",
			data: {step : step},
		}).done (function(data) {
			if (data["errors"])
			{
				showError("The following directories do not have the correct permissions:", data["errors"]);
			} else if(data["success"]) {
				showSuccess();
			}
		});
	}


	function showError(message, errors)
	{
		var errorstring = "";
		for (var i = 0; i < errors.length; i++)
		{
			errorstring += errors[i] + "<br />";
		}
		$("#errtitle").html(message);
		$("#errmsg").html(errorstring);
		if (step == 2)
		{
			$("#errbox").insertBefore("#dbinfo");
			$("#errbox").show();
			return;
		}
		$("#errbox").show();
		$("#currentpr").append("<span style=\"color:red\">Error!</span>");
	}

	function showSuccess()
	{
		if ($("#errbox").is(":visible"))
			$("#errbox").hide();
		if (spinner)
			spinner.stop();
		$("#currentpr").append("<span style=\"color:green\">Done!</span>");
		$("#dbinfo").hide();
		$("#createuser").hide();
		updateProgressBar();

		showContinueButton();
	}

	function updateProgressBar(show)
	{
		var progsteps = {1: "25%", 2: "50%", 3: "75%", 4: "100%"};
		if (show)
		{
			$("#progbar").width(progsteps[step-1]);
			return;
		}
		$("#progbar").width(progsteps[step]);
	}

	function showContinueButton()
	{
		$("#continuebutton").show();
	}
});