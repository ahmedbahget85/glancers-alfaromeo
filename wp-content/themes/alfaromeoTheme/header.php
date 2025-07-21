<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Alfa Romeo | Ezz Elarab </title>
	<!-- bootstrap CSS-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
	<!-- fonts -->
	<link href="https://fonts.cdnfonts.com/css/apex-new" rel="stylesheet" />
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link href="https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/css/intlTelInput.css" rel="stylesheet" />
	<!-- font-awsome -->
	<?php wp_head(); ?>
	
</head>

<body>
<?php if (is_page ('home')) { 
    ?>
        <!-- preloader -->
		<div class="pre-loader">
			<div class="pre-loader-inner">
				<h1 class="ml12 ">Alfa Romeo Passion for Driving</h1>
				<h2 class="preloader-percentage">0%</h2>
			</div>
		</div>
    <?php
  }
?>

<?php if (!is_page ('home') && !is_page ('about') && !is_page ('ezz-about')) { 
    ?>
	<nav class="model-menu navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#modelMenuItems"
            aria-controls="modelMenuItems" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-start" id="modelMenuItems">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link a-navigate" href="#highlights-section">Highlights <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-navigate" href="#exterior-section">Exterior</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-navigate" href="#interior-section">Interior</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-navigate" href="#safety-section">Safety</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-navigate" href="#infotainment-section">INFOTAINMENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-navigate" href="#performance-section">PERFORMANCE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link a-navigate" href="#technology-section">TECHNOLOGY</a>
                </li>

            </ul>
        </div>
	</nav>
	<?php
  }
?>

<main class="main-wrapper container-fluid">
	<!-- header -->
	<header>
		<nav class="navbar navbar-expand-md navbar-light ">
			<a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img alt="alfaromeo_logo" class="img-fluid" src="<?php bloginfo('template_directory'); ?>/asset/images/AW_01_Horizontal.png" /></a>
			<a class="nav-link ezz-logo d-block d-md-none" href="/ezz-about"><img alt="ezzelarab_logo"
			src="<?php bloginfo('template_directory'); ?>/asset/images/ezzalarab-logo-white.png" /></a>


			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#mainNavbarContent" aria-controls="mainNavbarContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="fas fa-bars"></i>
				<i class="fa fa-times" aria-hidden="true"></i>

				</span>

			</button>
			<div class="collapse navbar-collapse" id="mainNavbarContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown active light">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Models
						</a>
						<div class="dropdown-menu sub-menu py-0" aria-labelledby="navbarDropdown">
							<a class="back-menu px-3 py-2 d-block d-md-none">
								<img alt="arrow" class="img-fluid pl-3" src="<?php bloginfo('template_directory'); ?>/asset/icons/carousel-indicator.svg">
							</a>
							<div class="dropdown-menu-inner">
								<div class="dropdown-menu-left">
									<div class="dropdown-menu-left-inner">
										<?php $args = array( 'post_type' => 'models', 'posts_per_page' => 10 );
											$loop = new WP_Query( $args );
											while ( $loop->have_posts() ) : $loop->the_post();
										?>
											<a class="dropdown-item" href="<?php the_permalink(); ?>">
											<img class="img-fluid" src="<?php echo the_cfc_field( 'model-content' , 'main-image' , get_the_ID()); ?>"
												alt="model_image" />
											<span>
											<?php echo get_post_meta( get_the_ID(), 'name', true ) ?>
											</span>
											</a>
										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
										<!-- <a class="dropdown-item" href="#">
											<img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/asset/images/Model-DropDown/giulia.png"
												alt="Giulia" />
											<span>Giulia</span>
										</a>
										<a class="dropdown-item" href="/internal.html">
											<img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/asset/images/Model-DropDown/Stelvio.png"
												alt="Stelvio" />
											<span>Stelvio</span>
										</a> -->
									</div>
								</div>
								<div class="dropdown-menu-bottom">
									<div class="dropdown-menu-meduim">
										<div class="dropdown-menu-meduim-inner">
											<div class="meduim-inner-contain notHover">
												<h4 class="uppercase">
													measure distance in
													emotion not in
													kilometer
												</h4>
												<p class="font-sm">
													Your one way ticket to
													an extraordinary
													experience.<br />
													Enjoy a passionate trip
													with our
													<span class="capitalize">alfa romeo
														beauties.</span>
												</p>
												<a  class="btn uppercase" target="_blank" href="https://www.youtube.com/watch?v=oscXZuHhnBQ">watch video</a>
											</div>

											<?php $args = array( 'post_type' => 'models', 'posts_per_page' => 10 );
												$loop = new WP_Query( $args );
												while ( $loop->have_posts() ) : $loop->the_post();
											?>
												<div class="meduim-inner-contain isHover">
													<img  alt="model_name" class="img-fluid w-larger"
													src="<?php echo the_cfc_field( 'model-content' , 'description-image' , get_the_ID()); ?>" />
													<h4 class="uppercase">
														<?php echo the_cfc_field( 'model-content' , 'description-title' , get_the_ID()); ?>
													</h4>
													<p class="font-sm">
														<?php echo the_cfc_field( 'model-content' , 'description-content' , get_the_ID()); ?>	
													</p>
													<a  href="<?php the_permalink(); ?>" class="btn uppercase">discover more</a>
												</div>
											<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										</div>
									</div>
									<div class="dropdown-menu-right">
										<div class="dropdown-menu-right-inner notHover"
											style="background-image: url('<?php bloginfo('template_directory'); ?>/asset/images/Model-DropDown/2019-Alfa-Romeo-Giulia-and-2019-Alfa-Romeo-Stelvio.jpg');">
										</div>
										<?php $args = array( 'post_type' => 'models', 'posts_per_page' => 10 );
												$loop = new WP_Query( $args );
												while ( $loop->have_posts() ) : $loop->the_post();
										?>
										<div class="dropdown-menu-right-inner isHover"
											style="background-image: url(<?php echo the_cfc_field( 'model-content' , 'cover-image' , get_the_ID()); ?>);">
										</div>
										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="nav-item light"><a class="nav-link" href="/about">About Alfa</a></li>
					<li class="nav-item light"><a class="nav-link" href="/brochure-form">Request Brochure</a></li>
					<li class="nav-item light"><a class="nav-link" href="/drive-form">Test Drive</a></li>
					<li class="nav-item light"><a class="nav-link" href="/general-inquiry">Contact Us</a></li>


				</ul>

				<!-- <?php wp_nav_menu( array( 
					'theme_location' => 'primary-menu',
					'container_id' => 'cssmenu', 
					)); ?> -->
			</div>
			
			<a class="nav-link ezz-logo d-none d-md-block" href="/ezz-about"><img alt="ezzElarab_logo" src="<?php bloginfo('template_directory'); ?>/asset/images/ezzalarab-logo-white.png" /></a>


		</nav>
	</header>