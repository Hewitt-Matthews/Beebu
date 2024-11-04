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

    <div class="text-list-block">

      <div class="text-list-block__inner">

        <div class="text-list-block__meta">

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
                <img src="<?=get_template_directory_uri() ?>/assets/img/tick.svg" 
                     alt="Tick icon" />
                <p><?= $title ?></p>
              </div>

            <?php endforeach; ?>

          </div>

        <?php endif; ?>

      </div>

    </div>

  </div>

</div>