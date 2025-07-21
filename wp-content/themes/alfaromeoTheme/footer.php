<!-- footer -->
<footer>
			<h3 class="book text-uppercase">ALFA ROMEO | EZZ ELARAB</h3>
			<!-- <?php dynamic_sidebar( 'links-footer' ); ?>
			<!-- <ul class="list-group social-media-icons">-->
			<!--	<li class="facebook">-->
			<!--		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/asset/icons/SocialIcons/facebook.svg" /></a>-->
			<!--	</li>-->
			<!--	<li class="instagram">-->
			<!--		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/asset/icons/SocialIcons/instagram.svg" /></a>-->
			<!--	</li>-->
			<!--	<li class="youtube">-->
			<!--		<a href="#"><img src="<?php bloginfo('template_directory'); ?>/asset/icons/SocialIcons/youtube.svg" /></a>-->
			<!--	</li>-->
			<!--</ul> -->
		<div class="footer-sitemap list-group">
			<div class="list-group-inner">
				<h4>Models</h4>

				<ul class="models-list">
					<li><a href="/models/stelvio-2" class="font-sm light">stelvio</a></li>
					<li><a href="/models/guilia" class="font-sm light">guilia</a></li>
					<li><a href="/models/guilietta" class="font-sm light">guilietta</a></li>
				</ul>
			</div>		
			<div class="list-group-inner">
				<h4>Contact Us</h4>
				<ul class="contactUs-list">
					<li><a href="/drive-form" class="font-sm light">Test Drive</a></li>
					<li><a href="/brochure-form" class="font-sm light">Request Brochure</a></li>
					<li><a href="/general-inquiry" class="font-sm light">General Inquiry</a></li>
				</ul>
			</div>	
			
			<div class="list-group-inner">
				<h4>about us</h4>
				<ul class="aboutUs-list">
					<li><a href="/about" class="font-sm light">Alfa Romeo</a></li>
					<li><a href="/ezz-about" class="font-sm light">Ezz Elarab</a></li>
				</ul>

			</div>

		</div>	
			

			<ul class="list-group social-media-icons">
				<?php dynamic_sidebar( 'socialLinks-footer' ); ?>
			</ul> 


		
			<div class="copy-right">
				<p class="capitalize">copyright © <span class="text-uppercase">ALFAROMEO</span> | ezz elarab. 2020 – all
					rights reserved.
				</p>
			</ul>
		</footer>
		<!-- sticky sidebar -->
		<div id="sticky-sidenav" class="hidden">
			<?php dynamic_sidebar( 'sidbar-footer' ); ?>
			 <!-- <ul class="sticky-sidenav-inner list-group ">
				<li class="list-group-item">
					<a class="sticky-sidenav-hover" href="/drive-form">
						<img class="sticky-hover-img" src="<?php bloginfo('template_directory'); ?>/asset/icons/hover/steering-wheel.svg" />
						<img class="sticky-img" src="<?php bloginfo('template_directory'); ?>/asset/icons/steering-wheel.svg" />
						<span>test drive</span>
					</a>
				</li>
				<li class="list-group-item">
					<a class="sticky-sidenav-hover" href="/brochure-form">
						<img class="sticky-hover-img" src="<?php bloginfo('template_directory'); ?>/asset/icons/hover/leaflet.svg" />
						<img class="sticky-img" src="<?php bloginfo('template_directory'); ?>/asset/icons/leaflet.svg" />
						<span>request brochure</span>
					</a>
				</li>
				<li class="list-group-item" >
					<a class="sticky-sidenav-hover" href="/general-inquiry">
						<img class="sticky-hover-img" src="<?php bloginfo('template_directory'); ?>/asset/icons/hover/question.svg" />
						<img class="sticky-img" src="<?php bloginfo('template_directory'); ?>/asset/icons/question.svg" />
						<span>general inquiry</span>
					</a>
				</li>
			</ul>  -->


		</div>
	</main>

	<!-- bootstrap JS -->
	
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script src="https://www.livemeshthemes.com/siteorigin-widgets/wp-content/plugins/livemesh-siteorigin-widgets-pro/assets/js/jquery.waypoints.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
	</script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/js/intlTelInput.js"></script>
	
	<?php wp_footer();?>
	<!-- animate.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</body>

<script>
	$('<li class="square"></li>').insertAfter($('#menu-footer-menu li'));
</script>
</html>
