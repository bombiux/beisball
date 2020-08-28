
<?php
    $query = new WP_Query('post_type=live');
    
    while ( $query -> have_posts() ) : $query -> the_post();
?>
    <div class='live-stats'>
        <div class='head'>
            <p>
                <span><?php echo get_field('inicial_visitante') ?></span> - <span><?php echo get_field('inicial_local') ?></span>
            </p>
        </div>
        <div class='body'>
            <p><span><?php echo get_field('carreras_visitante') ?></span> - <span><?php echo get_field('carreras_local') ?></span></p>
        </div>
        <div class='footer'>
            <p>Inning <span><?php echo get_field('inning') ?></span></p>
        </div>
    </div>
<?php endwhile; wp_reset_postdata();?>