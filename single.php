<?php include('header.php'); ?>

<main id="maincontent" class="single-post">
    <div class="wrapper">

        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

            <article>
                <div class="single-post__thumbnail">
                    <figure><img class="single-post__img" src="<?php echo get_the_post_thumbnail_url() ?>"></figure>
                </div>

                <div class="single-post__content">
                    <div class="button button--small"><?php echo get_the_category()[0]->cat_name; ?></div>
                    <h1 class="single-post__title"><?php the_title(); ?></h1>
                    <p class="single-post__meta">Article by <span><?php echo get_the_author_meta('display_name', $author_id); ?></span> - <?php the_date(); ?></p>
                    <?php the_content() ;?>
                </div>
            </article>
            
        <?php endwhile; ?>
        <?php endif; ?>

    </div>

        <!-- RELATED POSTS -->
        <div class="single-post__related-content section--curved">
            <div class="wrapper">
                <h2>Related news</h2>
                <ul>
                <?php 
                $blogMostRecent = new WP_Query(array( 
                    'post_parent' => 0,
                    'posts_per_page' => 3,
                ));
                
                while($blogMostRecent->have_posts()){
                    $blogMostRecent->the_post();
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <div class="article-card__tag button button--small"><?php echo get_the_category()[0]->cat_name; ?></div>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="article-card__image">
                            <h3 class="article-card__title"><?php the_title(); ?></h3>
                            <p class="article-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                        </a>
                    </li>

                    <?php } wp_reset_postdata(); ?>  
                </ul>
            </div>

        </div>

    <!-- FLEXIBLE CONTENT - CTA -->
    <?php include('flexible-content.php'); ?>
</main>


<?php include('footer.php'); ?>