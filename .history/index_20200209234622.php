<?php
get_header();
?>

    <div class="news main-content">
		<div class="notes-preview-links">
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

<?php get_footer() ?>