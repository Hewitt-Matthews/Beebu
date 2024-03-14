<?php 

$image_size = get_sub_field('image_size');
$show_background_mask = get_sub_field('show_background_mask');
$image = get_sub_field('image');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

// Full Width Image
if ( $image_size ) : ?>

  <div class="image section
    <?php echo 'section--' . $section_options_background_colour; ?>
    <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
    <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>"
    style="background-image: url('<?= $image['url'] ?>');
  ">
    <div class="wrapper">
      <?php if($mask): ?>
        <div class="cta__mask"></div>
      <?php endif; ?>
    </div>
  </div>

<?php else : ?>

  <div class="image section
    <?php echo 'section--' . $section_options_background_colour; ?>
    <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
    <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  ">
    <div class="wrapper">
      <?php if ($show_background_mask) : ?>
        <div class="cta__mask"></div>
      <?php endif; ?>
      <div class="image__inner">
        <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="" />
      </div>
    </div>
  </div>

<?php endif; ?>