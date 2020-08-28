<?php
get_header();
?>

    <section class='first-screen'>
        <video autoplay muted playsinline loop src=" <?php echo get_template_directory_uri() . '/multimedia/Portada_ms.mp4' ?> " type="video/mp4"></video>
        <div class="overlay">
            <h5>Te prensentamos nuestra nueva página web</h5>
            <button>Ver Video</button>
        </div>
       
        <div id="station0" class="station">
            <div class="title">
                <span class="dashicons dashicons-controls-play"></span>
                <div id="title0" class="subtitle"></div>
                <div id="live0" class="live">LIVE</div>
                <div id="playing0" class="playing">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>
    </section>    

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

<script>
	var posts_myajax = '<?php echo serialize( $the_query->query_vars ) ?>',
    current_page_myajax = 1,
    max_page_myajax = <?php echo $the_query->max_num_pages ?>
</script>




<?php get_footer() ?>
