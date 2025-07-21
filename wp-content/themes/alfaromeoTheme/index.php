<?php
/*
Template Name: Home
*/
get_header(); 
?>
    <!-- slider 1st section -->
	<section id="first-slider">
		<div id="mainCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			<?php foreach( get_cfc_meta( 'home-slider' , get_the_ID() ) as $key => $value ){ ?>
				<li data-target="#mainCarousel" data-slide-to=<?php echo $key; ?> class="<?php if($key==0)echo "active"; ?>"></li>
			<?php }  ?>
			</ol>
			<div class="carousel-inner">

			
			<?php foreach( get_cfc_meta( 'home-slider' , get_the_ID() ) as $key => $value ){ ?>
				<div class="carousel-item <?php if($key==0)echo "active"; ?>">
					<div class="carousel-item-inner ">
						<div class="embed-responsive embed-responsive-16by9 d-none d-lg-block ">
							<video autoplay muted class="embed-responsive-item ">
								<source src="<?php echo the_cfc_field( 'home-slider' , 'home-slider-video' , get_the_ID() , $key); ?>" type="video/mp4" />
							</video>
						</div>
						<div class="slide-bg d-block d-lg-none"
							style="background-image: url('<?php echo the_cfc_field( 'home-slider' , 'home-slider-image' , get_the_ID() , $key); ?>');">
						</div>

						<div class="carousel-caption">
							<div class="caption-inner">
								<h1 class="text-uppercase light">
									<?php echo the_cfc_field( 'home-slider' , 'home-slider-title' , get_the_ID() , $key); ?>
								</h1>
								<h1 class="text-uppercase bold">
									<?php echo the_cfc_field( 'home-slider' , 'home-slider-description' , get_the_ID() , $key); ?>
								</h1>
								
							</div>
						</div>
					</div>
				</div>
			<?php }  ?>

			</div>
			<!-- <div class="slide-progress"></div> -->
		</div>
		<div class="sound-contain played">

			<img src="<?php bloginfo('template_directory'); ?>/asset/icons/speaker.svg" id="play-sound" />
			<img src="<?php bloginfo('template_directory'); ?>/asset/icons/mute.svg" id="mute-sound" />


			<audio id="audio" autoplay loop>
				<source src="<?php bloginfo('template_directory'); ?>/asset/audio/entrance.mp3" type="audio/mpeg" />
				Your browser does not support the audio
				element.
			</audio>
		</div>

	
	</section>

<?php get_footer(); ?>