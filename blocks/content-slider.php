<?php 

$title = get_sub_field('title');
$copy = get_sub_field('copy');
$slides = get_sub_field('slides');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding'); ?>

<div class="content-slider slider section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  " data-glide-el="track">

  <div class="wrapper wrapper--slider">

    <div class="content-slider__inner">

      <div class="meta">
        <h2 class="slider__title"><?=$title ?></h2>
        <p class="slider__description"><?=$copy ?></p>
      </div>
      
      <!-- Slider Navigation Buttons -->

    </div>
    
    <div class="content-slider__slider slider-wrapper slick">

      <?php foreach ( $slides as $slide ) :
            
        $slide_image = $slide['slide_image'];
        $title = $slide['title'];
        $copy = $slide['copy'];
        $alt_text = get_post_meta($slide_image['ID'], '_wp_attachment_image_alt', true);
      
      ?>

        <div class="content-slider__slide slick__slide">
          <div class="content-slider__content">
            <img class="slider__image" src="<?= $slide_image['url'] ?>" alt="<?= $alt_text ?: $title ?>" />
            <div class="content-slider__meta">
              <h2 class="content-slider__title"><?= $title ?></h2>
              <p class="content-slider__copy"><?= $copy ?></p>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

    </div>

  </div>

</div>

<script>
$( document ).ready(function() {
	$('.content-slider__slider').slick({
    slidesToShow: 1,
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