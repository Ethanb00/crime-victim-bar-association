<?php
/*
 * Template Name: Member Directory Available Only To Logged In Users
 */

get_header(); ?>
<?php if ( is_user_logged_in() ) { ?>
	<script>
		jQuery(function ($) {
			$(document).ready(function() {

	  $(window).on('hashchange', function() {
		window.scrollTo(window.scrollX, window.scrollY - 100);
	  });

	  $('a[href*="#"]').on('click', function(event) {
		let hash = this.hash;
		if (hash) {
		  event.preventDefault();
		  $('html, body').animate({
			scrollTop: $(hash).offset().top - 100
		  }, 750, function() {
			window.location.hash = hash;
		  });
		}
	  });
	});
		})
	</script>
	<div id="main-content" class="main-content" style="max-width:1140px; margin:0 auto; padding: 10px;">

	<?php echo do_shortcode("[DynamicUserDirectory name='original']"); 
}else{
	?>
	<div id="main-content" class="main-content" style="max-width:1140px; margin:0 auto; padding: 10px;">
		<h2>You must be logged in to view this page</h2>
		<a href="https://victimbar.org/wp-login.php?redirect_to=https%3A%2F%2Fvictimbar.org%2Fmember-directory%2F"><button >Login Here</button></a><?php
}?>


	</div><!-- #main-content -->

<?php
get_footer();