<?php 

$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

$args = array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  'tax_query' => array (
    array (
      'taxonomy' => 'post-type',
      'field' => 'slug',
      'terms' => 'guides',
    )
  )
);

$guides_query = new WP_Query( $args ); 

if ( !isset($_GET['posts']) || ( $_GET['posts'] !== 'guides' ) ) : ?>

<div class="guides-slider slider section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
      <div class="slider__inner">
        <div class="meta">
          <h2 class="slider__title">Guides</h2>
        </div>
        <a href="/articles?posts=guides" class="button button--black">See all guides</a>
        <!-- Slider Navigation Buttons -->
      </div>
      <div class="slider__slider">
        <?php if ( $guides_query->have_posts() ) :
          while ( $guides_query->have_posts() ) : $guides_query->the_post(); ?>

            <div class="slider__slide">
              <a href="<?php the_permalink(); ?>">
                <div class="article-card__tag button button--small"><?php echo get_the_category()[0]->cat_name; ?></div>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="article-card__image">
                <h3 class="article-card__title"><?php the_title(); ?></h3>
                <p class="article-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
              </a>
            </div>

          <?php endwhile; wp_reset_postdata();
        endif; ?>
      </div>
    </div>
</div>

<?php endif; ?>