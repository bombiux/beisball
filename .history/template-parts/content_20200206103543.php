<a href="<?php the_permalink(); ?>">
    <article id="post-<?php the_ID(); ?>" class='home-preview-link' >
        <figure class="post-thumbnail">
            <?php the_post_thumbnail( 'fb' ); ?>
        </figure>
        <div class="section-bg">
            <h2 class='news-preview'><?php the_title(); ?></h2>
            <p><?php echo get_excerpt(); ?></p>
        </div>
    </article>
</a>