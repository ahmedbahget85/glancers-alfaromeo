$(document).ready(function () {
	// $("#main-form").submit(function (event) {
	// 	var formId = this.id,
	// 		form = this;
	// 	event.preventDefault();
	// 	setTimeout(function () {
	// 		form.submit();
	// 	}, 5000);
	// });

	let searchParams = new URLSearchParams(window.location.search);
	if (searchParams.has("module-name")) {
		$("#lastSection").addClass("current");
		$("#select-section").removeClass("current");
	}
	var validNumber = false;
	var inputVal;
	var placeholder;
	var placeholderLength;
	var input = document.querySelector("#mobile");

	var iti = window.intlTelInput(input, {
		utilsScript:
			"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js",
		initialCountry: "",
		preferredCountries: ["eg"],
		// separateDialCode: true,
		autoFormat: false,
		autoHideDialCode: false,
		// don't insert international dial codes
		nationalMode: false,
		// number type to use for placeholders
		numberType: "MOBILE",
		// stop the user from typing invalid numbers
		preventInvalidNumbers: true,
		// stop the user from typing invalid dial codes
		preventInvalidDialCodes: true,
		formatOnDisplay: true,
	});
	window.iti = iti;

	$("#mobile").removeAttr("placeholder");
	$("#mobile").on("focusout", function (event) {
		document.getElementById("mobile").value = $("#mobile")
			.val()
			.replace(/[^+\d]/g, "");

		//Add country code prefix if removed
		if (
			$("#mobile")
				.val()
				.indexOf($(".iti__active .iti__dial-code").text()) != 0
		) {
			let mob = $("#mobile")
				.val()
				.replace(/[^+\d]/g, "");
			document.getElementById("mobile").value =
				$(".iti__active .iti__dial-code").text() + mob;
		}

		//Prevent delete country code
		$("#mobile").keydown(function (e) {
			if (
				$(".iti__active .iti__dial-code").text() == $("#mobile").val()
			) {
				if (e.keyCode === 8 || e.which === 8) {
					return false;
				}
			}
		});

		//Prevent cut and delete country code
		$("#mobile").bind("cut delete ", function (e) {
			if (
				$(".iti__active .iti__dial-code").text() == $("#mobile").val()
			) {
				e.preventDefault();
			}
		});

		//Validate mobile
		validNumber = iti.isValidNumber();

		if (
			$("#mobile-container .error").length &&
			$("#mobile-container .error").is(":visible")
		) {
			$("#mobile-container .iti__selected-flag").css("height", "55%");
		} else {
			$("#mobile-container .iti__selected-flag").css("height", "100%");
		}

		if (!validNumber && $("#mobile").val() != "") {
			$("#mobile-container .not-valid").show();
			$("#info-next-btn").prop("disabled", true);
		} else {
			$("#mobile-container .not-valid").hide();
		}
	});

	$("#info-next-btn").prop("disabled", true);
	$("#check-next-btn").prop("disabled", true);
	$("#inner-next-btn").prop("disabled", true);
	$(".form-section-inner").on("change", function () {
		$("#inner-next-btn").prop("disabled", false);
	});

	jQuery.validator.addMethod(
		"lettersonly",
		function (value, element) {
			return this.optional(element) || /^[a-z]+$/i.test(value);
		},
		"this field should contain letters only"
	);

	jQuery.validator.addMethod(
		"phoneUS",
		function (phone_number, element) {
			phone_number = phone_number.replace(/\s+/g, "");
			return (
				this.optional(element) ||
				(phone_number.length > 9 && phone_number.match(/^\+[0-9]{13}$/))
			);
		},
		"Only egyptian phone numbers are allowed to enter with the country code"
	);

	$("#main-form").validate({
		onkeyup: false,
		rules: {
			firstName: {
				required: true,
				lettersonly: true,
				minlength: 3,
				maxlength: 30,
			},
			lastName: {
				required: true,
				minlength: 3,
				maxlength: 30,
				lettersonly: true,
			},
			email: {
				required: true,
				email: true,
			},
			// "mobile": {
			// 	required: true,
			// 	phoneUS: true,
			// },
		},
		messages: {
			firstName: {
				required: "required",
				minlength:
					"Must be at least 3 characters, no numbers or special characters",
				maxlength: "Your firstname can't be more 30 characters",
			},
			lastName: {
				required: "required",
				minlength:
					"Must be at least 3 characters, no numbers or special characters",
				maxlength: "Your lastname can't be more 30 characters",
			},
			email: {
				required: "required",
				email: "Please use a valid email address!",
			},
			// "mobile": {
			// 	required: "required",
			// 	tel: "Telephone numbers must contain atleast 11 digits!",
			// }
		},
	});

	$("#info-section input").bind("keyup blur click", function () {
		// fires on every keyup & blur
		if ($("#main-form").validate().checkForm() && validNumber) {
			// checks form for validity
			$("#info-next-btn").prop("disabled", false); // enables button
		} else {
			$("#info-next-btn").prop("disabled", true); // disables button
		}
	});

	$("#check-content").on("change", function () {
		if ($("#check-content input[type=checkbox]:checked").length) {
			$("#check-next-btn").prop("disabled", false);
		} else {
			$("#check-next-btn").prop("disabled", true);
		}
	});

	$(window).keydown(function (event) {
		if (event.keyCode == 13 && !$("#beforeSubmit").hasClass("current")) {
			event.preventDefault();
			return false;
		} else if (
			event.keyCode == 13 &&
			$("#beforeSubmit").hasClass("current")
		) {
			$("#main-form").submit();
		}
	});

	// move between tabs
	$(".next-btn").on("click", function () {
		$(this)
			.parents(".form-section")
			.removeClass("current")
			.next()
			.addClass("current");
	});
	$(".prev-btn").on("click", function () {
		$(this)
			.parents(".form-section")
			.removeClass("current")
			.prev()
			.addClass("current");
	});

	//select car model
	$(".input-model input[type=radio]").change(function () {
		$(this).parents(".content").addClass("select");
		$(this).parents(".input-model").css("display", "none");
		$(this).parents(".input-model").siblings().css("display", "block");
		$(".selected-model .input-model")
			.eq($(this).parents(".input-model").index())
			.css("display", "block")
			.siblings()
			.css("display", "none");
	});
});
