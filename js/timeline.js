$(document).ready(function(){
	$(".about_button").click(function(){

		$(".profile-about-two").show();
		$(".profile-timeline").hide();
	});
	$(".timeline_button").click(function(){
		$(".profile-about-two").hide();
		$(".profile-timeline").show();
	});
	$(".about_button").click(function(){

		$(".another-profile-about-two").show();
		$(".profile-timeline").hide();
	});
	$(".timeline_button").click(function(){
		$(".another-profile-about-two").hide();
		$(".profile-timeline").show();
	});
});
		
		