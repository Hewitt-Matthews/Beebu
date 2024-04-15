<?php

$content = get_sub_field('content');
$reduce_width = get_sub_field('reduce_width');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding'); ?>

<div class="text-block section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">

  <div class="wrapper">

    <div class="text-block <?php if ( $reduce_width ) : echo 'reduce-width'; endif; ?>">

      <div class="text-block__inner">

        <?php if ( $content ) : ?>
          <?= $content ?>
        <?php endif; ?>

      </div>

    </div>

  </div>

</div>