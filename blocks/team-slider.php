<?php 

$title = get_sub_field('title');
$copy = get_sub_field('copy');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

$args = array(
  'post_type' => 'team',
  'posts_per_page' => -1,
);

$team_query = new WP_Query( $args ); ?>

<div class="team-slider slider section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper wrapper--slider">
        <div class="team-slider__inner">
          <div class="meta">
            <h2 class="slider__title"><?=$title ?></h2>
            <p class="slider__description"><?=$copy ?></p>
          </div>
          <!-- Slider Navigation Buttons -->
        </div>
        <div class="team-slider__slider slider-wrapper slick">
          <?php if ( $team_query->have_posts() ) :
            while ( $team_query->have_posts() ) : $team_query->the_post(); 
            
              $title = get_the_title();
              $member_position = get_field('member_position');
              $member_image = get_field('member_image');
            
            ?>

              <div class="team-slider__slide slick__slide">
                  <img class="team-slider__team-image" src="<?= $member_image['url'] ?>" />
                  <div>
                      <h3 class="team-slider__team-title"><?= $title ?></h3>
                      <p class="team-slider__team-position"><?= $member_position ?></p>
                  </div>
              </div>

            <?php endwhile; wp_reset_postdata();
          endif;?>
        </div>
    </div>
</div>

<script>
$( document ).ready(function() {
	$('.team-slider__slider').slick({
    slidesToShow: 4,
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