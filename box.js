$(document).ready(function(){
	$(".take").on("click", function(){
		$(this).hide();
		$.ajax({
			url:'takeInBox.php',
			type:'GET',
			data:'objectID='+$(this).attr('id'),
			success:function(data, statut){
				$(".take").html(data);
				$(".take").show();
				setTimeout(function(){
					window.location.href = "/";
				}, 7000);
			}
			
		});
	});
	$(".put").on("click", function(){
		$(this).hide();
		$.ajax({
			url:'putInBox.php',
			type:'GET',
			data:'objectID='+$(this).attr('id'),
			success:function(data, statut){
				$(".put").html(data);
				$(".put").show();
				setTimeout(function(){
					window.location.href = "/";
				}, 7000);
			}
			
		});
	});
}); 