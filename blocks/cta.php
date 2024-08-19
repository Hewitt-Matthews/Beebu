<?php

$type = 'postcode';
if(get_sub_field('cta_type')) {
    $type = 'button';
}
$remove_line = get_sub_field('remove_line');


$flourish = get_sub_field('show_background_flourish');
$flourish_colour = $flourish ? get_sub_field('flourish_colour') : null;
$mask = get_sub_field('show_background_mask');
$button = get_sub_field('button');
$title = get_sub_field('title');
$copy = get_sub_field('copy');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');
$background_position_x = get_sub_field('background_position_x');
?>

<!-- Background Image Position - Mobile Only -->
<?php if($background_position_x): ?>
<style>
  @media screen and (max-width: 1024px) {

    .ctacontainer .cta {
      background-position-x: <?= $background_position_x ?>% !important;
    }

  }
</style>
<?php endif; ?>

<div class="ctacontainer section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  ">
    <div class="wrapper">
        <div class="cta cta--<?=$type ?>" style="background-image: url('<?=get_sub_field('background_image')['url']; ?>');">
        <?php if($mask): ?>
            <div class="cta__mask"></div>
        <?php endif; ?>
        <?php if($flourish): 
          if ( $flourish_colour ) : ?>
            <div class="cta__flourish"></div>
          <?php else : ?>
            <div class="cta__flourish-clear"></div>
          <?php endif; ?>
        <?php endif; ?>
            <div class="cta__inner">
                <h2 class="cta__title"><?=$title ?></h2>
                <?php if($type == 'button' && $remove_line == false): ?>
                    <hr class="cta__rule" />
                <?php endif; ?>
                    <p class="cta__copy"><?=$copy ?></p>
                <?php if($type == 'button'): 
                  if ( $button !== '' ) : ?>
                    <a href="<?=$button['url'] ?>" class="button"><?=$button['title'] ?></a>
                  <?php endif; ?>
                <?php elseif ($type == 'postcode'): ?>
                  <form class="postcode-search" method="POST" action="https://signup.beebu.co.uk/bb2/postcode?"> 
                    <input class="postcode-search__input" type="text" name="postcode" value="" placeholder="Enter your postcode"> 
                    <button class="postcode-search__button" button="" type="submit" name="submit">Check Availability</button>
                  </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>