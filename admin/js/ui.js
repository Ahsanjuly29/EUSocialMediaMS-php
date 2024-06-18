$(document).ready(function(){
	$('.login-input input').blur(function(){
		$('.login-input label').removeClass('no-transition');
		if($(this).val() == ''){
			$(this).siblings().eq(0).removeClass('login-label-small');
		}else{
			$(this).siblings().eq(0).addClass('login-label-small');
		}
	});

	$('.login-input label').addClass('no-transition');
	$('.login-input input').focus(function(){
		$('.login-input label').removeClass('no-transition');
	});
	
	if($('.login-input input').val() == ''){
		$('.login-input input').siblings().eq(0).removeClass('login-label-small');
	}else{
		$('.login-input input').siblings().eq(0).addClass('login-label-small');
	}
	// Add Question toggle
	$('.add-question').click(function(){
		$('.question-add-option').toggleClass('invisible');
	});

	// User info effect
	$(".user-pro-picture").hover(function(){
    	$(this).siblings().addClass('exist');
    	$(this).siblings().addClass('show');
    	setImage();
    	setTimeout(setImage, 1000);
	 },function(){
    	var status = $(this);
	    status.siblings().removeClass('show');
	    setTimeout(function(){
	    	status.siblings().removeClass('exist');
	    },500);
	});

});

function setImage(){

	var imageContainer = document.querySelectorAll('.cover-image'),
		image = document.querySelectorAll('.cover-image img'),
		length = image.length;

	for(var i = 0; i < length; i++){
		if(image[i].naturalWidth/image[i].naturalHeight > imageContainer[i].clientWidth/imageContainer[i].clientHeight){
			image[i].style.height = '100%';
			image[i].style.width = 'auto';
			image[i].style.left = '-' + Math.round((image[i].clientWidth - imageContainer[i].clientWidth)/2) + 'px';
		}else{
			image[i].style.width = '100%';
			image[i].style.height = 'auto';
			image[i].style.top = '-' + Math.round((image[i].clientHeight - imageContainer[i].clientHeight)/2) + 'px';
		}
	}
}

window.addEventListener('load', function(){
	setImage();
	setTimeout(setImage, 1000); // for safety if setImage() does not work at first time
	setTimeout(setImage, 2000); // for safety if setImage() does not work at first time
	setTimeout(setImage, 3000); // for safety if setImage() does not work at first time
	$('label').css({'transition': 'none'});
	setTimeout(function(){
		$('label').css({'transition': 'all'});
	},100);
});