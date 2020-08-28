<?php
get_header();
?>

    <div class="news main-content">
		<div class="roster content">
			<div class="texto">
				<h2>ROSTER</h2>
				<button>VER <span class="dashicons dashicons-controls-play"></span></button>
			</div>
			<img src="<?php echo get_template_directory_uri() . '/multimedia/team.png' ?>" alt="">
		</div>
		<div class="calendar content">
			<div class="cal-info">
				<h2>CALENDARIO</h2>
				<div class="table">
					<h4><?php the_time('F Y') ?></h4>
					<div class="matches">
						<div class="first match">
							<div class="local">NICARAGUA</div>
							<div class="vs">VS</div>
							div.visitor>{}
						</div>
						<div class="second match"></div>
						<div class="second match"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="notes-preview-links">
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