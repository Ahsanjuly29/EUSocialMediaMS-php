<footer>
	
</footer>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->	
    <script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/jquery.viewbox.js"></script>
	<script src="js/jquery.isotope.min.js"></script> 
	<script src="js/functions.js"></script>
	<script src="js/timeline.js"></script>
	<script src="js/about.js"></script>
	<script>


		// js for nav
		$(document).ready(function(){
		    $(".nav-icon").click(function(){
		        $(".nav-list").addClass("nav-visible");
		        $(".footer-icon").addClass("hide");
		    });
		    $(".nav-cross-icon").click(function(){
		        $(".nav-list").removeClass("nav-visible");
		        $(".footer-icon").removeClass("hide");
		    });
		    $(".footer-fix").click(function(){
		        $(".small-device-page-right").addClass("show");
		        $(".small-device-page-left").addClass("hide");
		        $(".footer-fix").addClass("hide");
		        $(".footer-close").addClass("show");
		        $(".no-more").addClass("hide");
		    });
		    $(".footer-close").click(function(){
		        $(".small-device-page-right").removeClass("show");
		        $(".small-device-page-left").removeClass("hide");
		        $(".footer-fix").removeClass("hide");
		        $(".footer-close").removeClass("show");
		    });
		});
		
		// Like option in read_more page

		$('body').on('click', '.like-btn', function(e){
			e.preventDefault()

			$this = $(this)

			var post_id = $this.data('post-id'),
				user_id = $this.data('user-id')

		    $.get("vote-post.php?vote&user_id=" + user_id + "&forum_no=" + post_id,
		    function(data){
		        if( data == 'like' || data == 'unlike' ) {

		        	var color = data == 'like' ? 'green' : 'gray'
		        	$this.find('i').css('color', color)

		        	$.get("vote-count.php?vote&forum_no=" + post_id, function(totalLike){
		        		$this.find('.like-count').html(totalLike)
		        	})

		        } else {
		        	console.warn('Like option does not working')
		        }
		    });
		})

		// Load more option

		if( $('.home').length || $('.forum-page').length || $('.timeline-page').length ) {

			var lockAction = false,
				unlockActionTime = 500,
				enOfResult = false,
				waiting = false,
				page = 1,
				url, appendTo, pageName, user

			if( $('.home').length ) {
				url = 'load-more-post.php'
				appendTo = '.page-left'
			} else if ( $('.forum-page').length ) {
				url = 'load-more-forum.php'
				appendTo = '.page-left'
			}else if ( $('.timeline-page').length ) {
				url = 'load-more-timeline.php'
				appendTo = '.profile-timeline-inner'
				pageName = $('.timeline-page').data('profile')
				user = $('.like-btn').data('other-id')
			}

			function isCrossFooter(){
				return $(window).scrollTop() + $(window).height() >= $('footer').offset().top - 100
			}

			$(window).on('scroll', function(){


				if(lockAction || waiting || enOfResult) return


				if( isCrossFooter() ) {

					lockAction = true
					setTimeout(function(){
						lockAction = false
					}, unlockActionTime)

					waiting = true
					$('.loading-image').show()
					$.get( url + "?page=" + page + "&page_name=" + pageName + "&user=" + user, function(data){
						
						if(data){
							$(appendTo).append(data)
			        		page++
						}else{
							enOfResult = true
							$('.no-more').show()
						}
						waiting = false
						$('.loading-image').hide()		
		        	})
				}
			})
		}



	</script>
