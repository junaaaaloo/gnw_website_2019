$(document).on("click", ".date-item", function() {
	var month = $(this).data("month");
	var date = $(this).data("date");
	var day = $(this).data("day");
	console.log(month + " " + date + " " + day);
	$("input#month").val(month);
	$("input#day").val(date);
	$("input#dayWeek").val(day);
	$("#chooseDate").submit();
});

$(document).on("click", "#reserveBtn", function() {
	var id = $(this).data("id");
	$("input#slotId").val(id);
	$("#reserveSlot").submit();
});