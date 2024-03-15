<?php

$title = get_sub_field('title');
$copy = get_sub_field('copy');
$button = get_sub_field('button');
$list = get_sub_field('list');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding'); ?>

<div class="text-list-block section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">

  <div class="wrapper">

    <div class="text-list-block text-list-block--<?= $alignment ?>">

      <div class="text-list-block__inner">

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

      <?php if ( $list ) : ?>

        <div class="text-list-block__list">

          <?php foreach ( $list as $item ) : 
          
            $title = $item['title'];

          ?>

            <div class="text-list-block__list-inner">
              <img src="http://localhost:10109/wp-content/uploads/2024/03/Tick.svg" />
              <p><?= $title ?></p>
            </div>

          <?php endforeach; ?>

        </div>

      <?php endif; ?>

    </div>

  </div>

</div>