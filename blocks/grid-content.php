<?php 

$title = get_sub_field('title');
$grid_width = get_sub_field('grid_width');
$grid_blocks = get_sub_field('grid_blocks');
$description = get_sub_field('description');
$title_description_position = get_sub_field('title_-_description_position');
$alignment = $title_description_position ? 'left-right' : 'center';
$button = get_sub_field('button');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>

<div class="grid-content section 
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
      <?php if ( $title || $description ) : ?>
        <div class="grid-content__inner <?= $alignment ?>">
          <h2 class="grid-content__title"><?=$title ?></h2>
          <p class="grid-content__description"><?=$description ?></p>
        </div>
      <?php endif; ?>
      <div class="grid-content__grid grid-content__columns-<?= $grid_width ?>">
        <?php foreach ( $grid_blocks as $block ) : ?>
          <?php if ( $block['page_link'] && $block['link_type'] ) : ?>
            <a href="<?= $block['page_link']['url'] ?>" class="grid-content__link">
          <?php endif; ?>
            <div class="grid-content__block">
              <img class="grid-content__block-image" src="<?= $block['icon']['url'] ?>" />
              <div>
                <h2 class="grid-content__block-title"><?= $block['title'] ?></h2>
                <p class="grid-content__block-copy"><?= $block['description'] ?></p>
                <?php if ( $block['page_link'] && !$block['link_type'] ) : ?>
                  <a href="<?= $block['page_link']['url'] ?>" class="button button--black"><?= $block['page_link']['title'] ?></a>
                <?php endif; ?>
              </div>
            </div>
          <?php if ( $block['page_link'] && $block['link_type'] ) : ?>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <?php if ( $button ) : ?>
        <div class="grid-content__footer">
          <a href="<?= $button['url'] ?>" class="button"><?=$button['title'] ?></a>
        </div>
      <?php endif; ?>
    </div>
</div>