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

      <?php foreach ( $slides as $slide ) :
            
        $slide_image = $slide['slide_image'];
        $title = $slide['title'];
        $copy = $slide['copy'];
      
      ?>

        <div class="slider__slide">
          <img class="slider__image" src="<?= $slide_image['url'] ?>" />
          <div>
            <h2 class="slider__title"><?= $title ?></h2>
            <p class="slider__copy"><?= $copy ?></p>
          </div>
        </div>

      <?php endforeach; ?>

    </div>

  </div>

</div>