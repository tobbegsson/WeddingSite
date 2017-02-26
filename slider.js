$(window).load(function(){
	
	slideFunc();
	
	function slideFunc(){
		$(".slideDiv #1").show("fade", 1000)
		$(".slideDiv #1").delay(5000).hide("slide", {direction: 'left'}, 1000);
		
		var slideCnt = $(".slideDiv img").size();
		var cntVar = 2;
		
		setInterval(function(){
			$(".slideDiv #" + cntVar).show("slide", {direction: 'right'}, 1000);
			$(".slideDiv #" + cntVar).delay(5000).hide("slide", {direction: 'left'}, 1000);
			
			if(cntVar == slideCnt){
				cntVar = 1;
			}else{
				cntVar = cntVar + 1;
			}
		}, 7000);
	}
	
});