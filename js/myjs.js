$(document).ready(function(){
$(".fd-capacity").hide();
$(".order_details_infos").hide();

$("#category > ul > li").click(function(){
		$(this).next("ul").slideToggle(300);
	});

$("#main-menu-nav").click(function(){
		$('#slogan').fadeToggle(300);
	});

$(".order_details").click(function(){
		$(this).nextUntil(".order_details").toggle(300);
		$(this).css("background-color","grey");
	});

});

