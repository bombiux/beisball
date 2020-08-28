<?php
get_header();
?>

    <div class="news main-content">
		<div class="roster content">
			<div class="texto">
				<h2>ROSTER</h2>
				<a href="<?php echo get_site_url(null, '/roster'); ?>">
					<button>VER <span class="dashicons dashicons-controls-play"></span></button>
				</a>
			</div>
			<div class="roster-img">
				<img src="<?php echo get_template_directory_uri() . '/multimedia/team.png' ?>" alt="">
			</div>
		</div>
		<div class="calendar content">
			<div class="texto">
				<h2>CALENDARIO</h2>
				<!-- <a href="<?php /* echo get_site_url(null, '/calendario'); */ ?>">
					<button>VER <span class="dashicons dashicons-controls-play"></span></button>
				</a> -->
			</div>
			<div class="table">
				<h4><?php the_time('F Y') ?></h4>
				<div class="matches">
					<?php get_template_part('template-parts/calendar'); ?>
				</div>
			</div>
		</div>
		<div class="notes-preview-links">
			<div class="slides">
				<?php
					$query_args = array(
						'post_type' => 'post',
						'posts_per_page' => 3
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