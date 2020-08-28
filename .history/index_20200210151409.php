<?php
get_header();
?>

    <div class="news main-content">
		<div class="roster content">
			<h3></h3>
			<img src="<?php echo get_template_directory_uri() . '/multimedia/team.png' ?>" alt="">
		</div>
		<div class="calendar content">

		</div>
		<div class="notes-preview-links content">
			<div class="slides">
				<?php
					$query_args = array(
						'post_type' => 'post',
					);
					$the_query = new WP_Query( $query_args );
				?>
	
				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
					get_template_part('template-parts/content') ?>
				<?php endwhile; ?>

				<?php endif; wp_reset_query(); ?>
			</div>
		</div>
    </div>
</div>

<?php get_footer() ?>