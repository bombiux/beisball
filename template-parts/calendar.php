<?php
    $args = array(
        'post_type'         => 'calendario',
        'posts_per_page'    => '3',
        'meta_key'          => 'fecha',
        'orderby'           => 'meta_value',
        'order'             => 'ASC',
        'meta_query'        => array( 
            array(
                'key'       => 'fecha',
                'type' => 'DATE',                   
                'compare'   => '<='           
            ),
            array(
                'key'       => 'fecha',
                'type' => 'DATE',
                'compare'   => '>='           
            ),
        )
    );          

    $query = new WP_Query( $args );

    while ( $query -> have_posts() ) : $query -> the_post();
    $local = get_field( 'local' );
    $visitante = get_field( 'visitante' );
    $fecha = get_field('fecha');
?>
    <div class="match">
        <div class="local">
            <figure>
                <img src="<?php echo get_template_directory_uri() . '/multimedia/teams/' . $local['value'] .'.png'; ?>" alt="Bandera <?php echo esc_attr($local['label']); ?>">
                <figcaption>
                    <p><span class="local-<?php echo esc_attr($local['value']); ?>"><?php echo esc_html($local['label']); ?></span></p>
                </figcaption>
            </figure>
        </div>
        <div class="vs">VS</div>
        <div class="visitor">
            <figure>
                <img src="<?php echo get_template_directory_uri() . '/multimedia/teams/' . $visitante['value'] .'.png'; ?>" alt="Logo <?php echo esc_attr($visitante['label']); ?>">
                <figcaption>
                    <p><span class="visitante-<?php echo esc_attr($visitante['value']); ?>"><?php echo esc_html($visitante['label']); ?></span></p>
                </figcaption>
            </figure>
        </div>
    </div>
<?php endwhile; wp_reset_postdata();?>