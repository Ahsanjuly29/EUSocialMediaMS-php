
$(document).ready(function(){
	$('#admin-slidebar-toggle').click(function(){
		$('.admin-left').toggleClass('hide-sidebar');
		$('.admin-right').toggleClass('big-admin-area');
	});
	$('.admin-show').click(function(){
		$(this).toggleClass('admin-show-focus');
		$('.admin-drop-down').toggleClass('admin-drop-down-show');
	});
	$('.admin-sidebar-menu > ul > li').click(function(){
		var li = $(this).find('ul li');
		$('.admin-sidebar-menu > ul > li').removeClass('highlight');
		$('.admin-sidebar-menu > ul > li > ul').css('height', '0');
		$(this).addClass('highlight');
		$(this).find('ul').css('height', li.height() * li.length + 'px');
	});

	// Upload Image

	var imageType = ['jpg','jpeg', 'png', 'gif'];


	$('.upload-button').change(function(){
		var imageDir = $('.upload-button').val();
			extension = imageDir.slice(imageDir.lastIndexOf('.')+1).toLowerCase(),
			isTypeOK = false;

		if(imageDir) {

			for(var i = 0, length = imageType.length; i < length; i++){
				if(extension == imageType[i]){
					isTypeOK = true;
					break;
				}
			}
			if(!isTypeOK) {
					$('.upload-button').val('');
					$('.image-input-button span').removeClass('uploaded');
					$('.image-name').removeClass('has-image-name');
					$('.image-name').val('Choose an Image');
					$('.popup').addClass('show');
					$('body').addClass('stop-scroll');
			}else{
				$('.image-input-button span').addClass('uploaded');
				$('.image-name').addClass('has-image-name');
				$('.image-name').val(imageDir.slice(imageDir.lastIndexOf('\\')+1));
			}
		}
		else {
			$('.image-input-button span').removeClass('uploaded');
			$('.image-name').removeClass('has-image-name');
			$('.image-name').val('Choose an Image');
		}
	});


	// Remove Invalid Image Popup
	$('.popup-inner a').click(function(){
		$('.popup').removeClass('show');
		$('body').removeClass('stop-scroll');
	});
	$('.popup-inner span').first().click(function(){
		$('.popup').removeClass('show');
		$('body').removeClass('stop-scroll');
	});

});


// Page Loader

window.addEventListener('load', function(){
	$('.page-loader').addClass('page-loader-fade-out');
	setTimeout(function(){
		$('.page-loader').addClass('page-loader-hide');
	}, 500);
});

