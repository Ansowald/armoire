$(document).ready(function(){
	$(".box").on("click", function(){
		if(!$(this).hasClass("box_empty")){
			var box_id = $(this).attr("id");
			window.location.href = "/box.php?boxId="+box_id;
		}
	});
});