<?php 

$title = get_sub_field('title');
$testimonial_selection = get_sub_field('testimonial_selection');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding'); ?>

<div class="team-testimonial-slider slider section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="slider__inner">
          <div class="meta">
            <h2 class="slider__title"><?=$title ?></h2>
          </div>
          <!-- Slider Navigation Buttons -->
        </div>
        <div class="slider__slider">
          <?php foreach ( $testimonial_selection as $slide ) : 
            
              $title = get_the_title( $slide->ID );
              $testimonial = get_field('testimonial', $slide->ID);
              $position = get_field('position', $slide->ID);
              $image = get_the_post_thumbnail_url($slide->ID);
            
            ?>

              <div class="slider__slide">
                  <img class="slider__testimonial-image" src="<?= $image ?>" />
                  <div>
                      <p class="slider__testimonial-testimonial"><?= $testimonial ?></p>
                      <p class="slider__testimonial-title"><?= $title ?></p>
                      <p class="slider__testimonial-position"><?= $position ?></p>
                  </div>
              </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
$( document ).ready(function() {
	$('.slider__slider').slick({
	  slidesToShow: 1
	});
});
</script>