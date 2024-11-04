<?php

$title = get_sub_field('title');
$copy = get_sub_field('copy');
$grid_items = get_sub_field('grid_items');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding'); ?>

<div class="coloured-block-grid-block section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">

  <div class="wrapper">

    <div class="coloured-block-grid-block__inner">

      <div class="coloured-block-grid-block__intro">

        <?php if ( $title ) : ?>
          <h2><?= $title ?></h2>
        <?php endif; ?>

        <?php if ( $copy ) : ?>
          <?= $copy ?>
        <?php endif; ?>

      </div>

      <?php if ( $grid_items ) : ?>

        <div class="coloured-block-grid-block__list">

          <?php foreach ( $grid_items as $item ) : 
          
            $title = $item['title'];
            $copy = $item['copy'];
            $icon = $item['icon'];
            $alt_text = get_post_meta($icon['ID'], '_wp_attachment_image_alt', true);

          ?>

            <div class="coloured-block-grid-block__list-inner">

              <img src="<?= $icon['url'] ?>" alt="<?= $alt_text ?: $icon['alt'] ?>" class="" />
              <div class="meta">
                <p class="title"><?= $title ?></p>
                <p><?= $copy ?></p>
              </div>

            </div>

          <?php endforeach; ?>

        </div>

      <?php endif; ?>

    </div>

  </div>

</div>