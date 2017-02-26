$(document).ready(function(){
	
	$("#burgerMenu").hide();
	
	$("#menuBtnCont").click(
		function(){
			$("#burgerMenu").toggle();
		}
	);
	
	$(".burgerA").click(
		function(){
			$("#burgerMenu").hide();
		}
	);
		
});