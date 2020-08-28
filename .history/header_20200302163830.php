
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if(is_page(array( 'inicio', 'roster' ))); ?>
		<meta property="og:title" content="<?php bloginfo('name'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="<?php echo get_template_directory_uri() . '/multimedia/fb.jpg' ?>" />
		<meta property="og:description" content="<?php bloginfo('description'); ?>">
		<meta property="og:url" content="<?php echo get_site_url(); ?>" />
	<?php endif ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<a href="<?php echo get_home_url(); ?>">
				<img class='logo' src=" <?php echo get_template_directory_uri() . '/multimedia/logo.png' ?>" alt="Logo Selección Beisbol">
			</a>
		</div>
		<div id="nav-container">			
			<nav id="nav-content" tabindex="0">
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'menu-principal',
					'container'         => ''
				));
				?>
			</nav>
		</div>
		<?php get_template_part('template-parts/live') ?>
		<div class="social-links">
			<a href="https://www.facebook.com/selebeisbolnic/"><span class="dashicons dashicons-facebook-alt"></span></a>
			<a href="https://www.instagram.com/selebeisbolnic/"><span class="dashicons dashicons-instagram"></span></a>
			<a href=""><span class="dashicons dashicons-video-alt3"></span></a>
			<a href="https://twitter.com/selebeisbolnic"><span class="dashicons dashicons-twitter"></span></a>
		</div>
	</header>

	<main id="content" class="site-content">
