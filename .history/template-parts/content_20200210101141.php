
    <article id="post-<?php the_ID(); ?>" class='home-preview-link' >
        <figure class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </figure>
        <div class="over-metadata">
                <figure></figure>
                <img src="<?php echo get_template_directory_uri() . '/multimedia/logo.png' ?>" alt="">
                <h2 class='news-preview'><?php the_title(); ?></h2>
                <?php the_category() ?>
        </div>
    </article>
