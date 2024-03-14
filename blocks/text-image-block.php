<?php

$title = get_sub_field('title');
$copy = get_sub_field('copy');
$button = get_sub_field('button');
$alignment = get_sub_field('alignment');
$main_image = get_sub_field('main_image');
$add_overlay_image = get_sub_field('add_overlay_image');
$overlay_image = $add_overlay_image ? get_sub_field('overlay_image') : null;
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding'); ?>

<div class="text-image-block section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">

  <div class="wrapper">

    <div class="text-image-block text-image-block--<?= $alignment ?>">

      <div class="text-image-block__inner">

        <?php if ( $title ) : ?>
          <h2><?= $title ?></h2>
        <?php endif; ?>

        <?php if ( $copy ) : ?>
          <?= $copy ?>
        <?php endif; ?>

        <?php if ( $button ) : ?>
          <a class="button" href="<?= $button['url']; ?>" target="<?= $button['target']; ?>"><?= $button['title']; ?></a>
        <?php endif; ?>

      </div>

      <div class="text-image-block__image">

        <?php if( !empty( $main_image ) ) : ?>
          <img src="<?= $main_image['url'] ?>" alt="<?= $main_image['alt'] ?>" width="<?= $main_image['width'] ?>" height="<?= $main_image['height'] ?>" />
        <?php endif; ?>

        <?php if( !empty( $overlay_image ) ) : ?>
          <img src="<?= $overlay_image['url'] ?>" alt="<?= $overlay_image['alt'] ?>" width="<?= $overlay_image['width'] ?>" height="<?= $overlay_image['height'] ?>" class="overlay-image" />
        <?php endif; ?>

      </div>

    </div>

  </div>

</div>