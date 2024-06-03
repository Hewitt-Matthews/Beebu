<?php

$featured_article = get_field('featured_article');

if ( $featured_article ) : 

$title = get_the_title($featured_article);
$date = get_the_date('d/m/Y', $featured_article);
$featured_image = get_the_post_thumbnail_url($featured_article);
$copy = wp_trim_words( get_the_excerpt($featured_article), 20, '...' );
$link = get_the_permalink($featured_article); ?>

  <div class="featured-article section section--spaced">

    <div class="wrapper">

      <h2>Featured post</h2>

      <div class="featured-article__article">

        <div class="featured-article__image">

          <?php if( !empty( $featured_image ) ) : ?>
            <img src="<?= $featured_image ?>" alt="<?= $title ?>" />
          <?php endif; ?>

        </div>

        <div class="featured-article__inner section--green">

          <?php if ( $title ) : ?>
            <h3><?= $title ?></h3>
          <?php endif; ?>
<!-- 
          <?php if ( $date ) : ?>
            <p class="date"><strong><?= $date ?></strong></p>
          <?php endif; ?> -->

          <?php if ( $copy ) : ?>
            <p><?= $copy ?></p>
          <?php endif; ?>

          <a class="button button--black" href="<?= $link ?>">Read more</a>

        </div>

      </div>

    </div>

  </div>

<?php endif; ?>