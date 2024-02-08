var max = false;
$(function(){
	$("#cart").hover(function(){
		if (!max) $("#cart").stop().animate({"left": "0"}, "fast");
	}, function(){
		if (!max) $("#cart").stop().animate({"left": "-20em"}, "fast");				
	});
	
	
	$("#maximize").click(function(){
		max = true;
		$("#cart").css("right", "7em");
		$("#cart").css("width", "auto");
		$("#cartmask").fadeIn();
		$("#minimize").show();
		$("#maximize").hide();
	});
	
	$("#minimize, #cartmask").click(function(){
		max = false;
		$("#cart").css("right", "auto");
		$("#cart").css("width", "20em");
		$("#cartmask").fadeOut();
		$("#minimize").hide();
		$("#maximize").show();
	});
	
	$(".requirelogin").click(function(){
		$("#dialogparent").fadeIn();
	});
	$("#c_rate").click(function(){
		var thb = document.getElementById("txtthb").value;
		var usd = document.getElementById("txtusd").value;
		var pre_url = document.getElementById("pre_url").value;
		//alert("th="+thb+"  usd="+usd)
		document.location = "manage/setting_rate.php?txtthb="+thb+"&txtusd="+usd+"&pre_url="+pre_url;
	});
	/*
	$("#dialogparent .mask, #dialogparent .close").click(function(){
		$("#dialogparent").fadeOut();
	})
	*/
	
	//loadCart();
});
 