function showContent(){
	$(".activitycontent").slideToggle(500, "swing", function(){
		if ($(".activitycontent").is(":visible")){
			$(".changeColor").fadeIn("fast", function(){
				$(".changeColor").css({"backgroundColor" : "blue"});
			});
		}
		else {
			$(".changeColor").fadeIn("fast", function(){
				$(".changeColor").css({"backgroundColor" : "white"});
			});			
		}
	});
}

/*
$("#addcomment").click(function(){
	$("#myModal .modal-dialog").css({"width" : "1200px"});
	$(".csoform").css({"display" : "block"});
});
$("#close").click(function(){
	$("#myModal .modal-dialog").css({"width" : "50\%"});
	$(".csoform").css({"display" : "none"});
});*/
