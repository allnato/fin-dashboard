function showContent() {
    $(".activitycontent").slideToggle(500, "swing", function () {
		if ($(".activitycontent").is(":visible")) {
			$(".changeColor").fadeIn("fast", function () {
				$(".changeColor").css({"backgroundColor" : "ghostwhite"});
			});
		} else {
			$(".changeColor").fadeIn("fast", function () {
				$(".changeColor").css({"backgroundColor" : "white"});
			});
		}
	});
}