(function () {
	console.log("js loaded");
	setInterval(() => {
		document.querySelector("[data-date_time]").innerHTML =
			new Date().toUTCString();
	}, 1000);
})();
$(document).ready(function () {
	// document.querySelectorAll(".nav-item > a").forEach((target) => {
	// new mdb.Ripple(target, {
	// rippleColor: "#fff",
	// rippleDuration: "1000ms",
	// });
	// });

	$('input[name="dob"], input.datepicker').datepicker({
		dateFormat: "yy-mm-dd",
		maxDate: '+0D',
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
	});
	$('input.datepicker, .datepicker').datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		changeYear: true,
		showOtherMonths: true,
	});
	$.each($('input[type="tel"], input[type="number"]'), function (index, value) {
		$(value).keypress(function (e) {
			if (isNaN(String.fromCharCode(e.which))) {
				e.preventDefault();
			}
		});
	});
});