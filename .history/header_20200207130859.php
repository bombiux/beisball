
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<img class='logo' src=" <?php echo get_template_directory_uri() . '/multimedia/logo.png' ?>" alt="Radio 580 Logo">
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
		<div class='live-stats'>
			<header>
				<p>
					<span>N</span> - <span>C</span>
				</p>
			</header>
			<body>
				<p><span>2</span> - <span>0</span></p>
			</body>
			<footer>
				<p>inning <span>6</span></p>
			</footer>
		</div>
	</header>

	<main id="content" class="site-content">
