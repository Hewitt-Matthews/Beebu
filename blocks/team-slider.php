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
    <div class="wrapper">
        <div class="slider__inner">
          <div class="meta">
            <h2 class="slider__title"><?=$title ?></h2>
            <p class="slider__description"><?=$copy ?></p>
          </div>
          <!-- Slider Navigation Buttons -->
        </div>
        <div class="slider__slider">
          <?php if ( $team_query->have_posts() ) :
            while ( $team_query->have_posts() ) : $team_query->the_post(); 
            
              $title = get_the_title();
              $member_position = get_field('member_position');
              $member_image = get_field('member_image');
            
            ?>

              <div class="slider__slide">
                  <img class="slider__team-image" src="<?= $member_image['url'] ?>" />
                  <div>
                      <h2 class="slider__team-title"><?= $title ?></h2>
                      <p class="slider__team-position"><?= $member_position ?></p>
                  </div>
              </div>

            <?php endwhile; wp_reset_postdata();
          endif;?>
        </div>
    </div>
</div>