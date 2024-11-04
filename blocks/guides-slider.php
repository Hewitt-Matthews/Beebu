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

$guides_query = new WP_Query( $args ); ?>

<div class="guides-slider slider section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  " data-glide-el="track">
    <div class="wrapper wrapper--slider">
      <div class="guides-slider__inner">
        <div class="meta">
          <h2 class="slider__title">Guides</h2>
        </div>
        <a href="/guides" class="button button--black">See all guides</a>
        <!-- Slider Navigation Buttons -->
      </div>
      <div class="guides-slider__slider slider-wrapper slick">
        <?php if ( $guides_query->have_posts() ) :
          while ( $guides_query->have_posts() ) : $guides_query->the_post(); 
            $image_id = get_post_thumbnail_id();
            $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
          ?>

            <div class="slider__slide slick__slide">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" 
                     alt="<?= $alt_text ?: get_the_title() ?>"
                     class="article-card__image">
                <h3 class="article-card__title"><?php the_title(); ?></h3>
                <p class="article-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
              </a>
            </div>

          <?php endwhile; wp_reset_postdata();
        endif; ?>
      </div>
    </div>
</div>

<script>
$( document ).ready(function() {
	$('.slick').slick({
	  centerMode: true,
	  slidesToShow: 3,
	  responsive: [
      {
        breakpoint: 980,
        settings: {
          slidesToShow: 1
        }
      }
	  ]
	});
});
</script>