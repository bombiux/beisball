<?php
get_header();
?>

    <section class='first-screen'>
        <video autoplay muted playsinline loop src=" <?php echo get_template_directory_uri() . '/multimedia/Portada_ms.mp4' ?> " type="video/mp4"></video>
        <div class="overlay">
            <h5>Te prensentamos nuestra nueva página web</h5>
            <button>Ver Video</button>
        </div>

    <div class="news main-content">
        <h6><span>Últimas Noticias</span></h6>
		
			<?php
 
			  $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
			  $query_args = array(
			    'post_type' => 'post',
			    'paged' => $paged
			  );
 
			  $the_query = new WP_Query( $query_args );
			?>
 
            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                get_template_part('template-parts/content') ?>
			<?php endwhile; ?>
 
			<?php if ($the_query->max_num_pages > 1) ?>
			<button class="loadmore2">Cargar más noticias</button>
			
			<?php endif; wp_reset_query(); ?>
    </div>
</div>

<?php get_footer() ?>