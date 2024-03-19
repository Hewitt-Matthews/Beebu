<?php include('header.php'); ?>

<main id="maincontent" class="single-post">

  <div class="wrapper">

    <?php if(have_posts()) : ?>
      
      <?php while(have_posts()) : the_post(); 
      $author_id = get_post_field( 'post_author', $post_id );?>

        <article>

          <div class="single-post__thumbnail">
            <figure><img class="single-post__img" src="<?php echo get_the_post_thumbnail_url() ?>"></figure>
          </div>

          <div class="single-post__content">
            <div class="button button--small"><?php echo get_the_category()[0]->cat_name; ?></div>
            <h1 class="single-post__title"><?php the_title(); ?></h1>
            <p class="single-post__meta">Article by <span><?php echo get_the_author_meta('display_name', $author_id); ?></span> - <?php the_date(); ?></p>
            <?php the_content() ;?>
            <?php /******************************************************************************************
             * Social Share
             ******************************************************************************************/
            get_template_part('/template-parts/social-share'); ?>
          </div>

        </article>
            
      <?php endwhile; ?>
      
    <?php endif; ?>

  </div>

  <?php include('flexible-content.php'); ?>

</main>


<?php include('footer.php'); ?>