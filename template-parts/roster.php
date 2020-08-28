<?php
    $query = new WP_Query('post_type=roster');
    
    while ( $query -> have_posts() ) : $query -> the_post();
?>        
    <h2 id='roster-sub-title'><?php the_title(); ?></h2>
    <div class="container">
        <?php get_li_items('lanzadores'); ?>

        <?php get_li_items('infielders'); ?>
    
        <?php get_li_items('receptores'); ?>
    
        <?php get_li_items('jardineros'); ?>
    
        <?php get_li_items('cuerpo_tec'); ?>
    </div>
<?php endwhile; wp_reset_postdata();?>