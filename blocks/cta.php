<?php

$type = 'postcode';
if(get_sub_field('cta_type')) {
    $type = 'button';
}

$flourish = get_sub_field('show_background_flourish');
$mask = get_sub_field('show_background_mask');
$button = get_sub_field('button');
$title = get_sub_field('title');
$copy = get_sub_field('copy');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>
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
        <?php if($flourish): ?>
            <div class="cta__flourish"></div>
        <?php endif; ?>
            <div class="cta__inner">
                <h2 class="cta__title"><?=$title ?></h2>
                <?php if($type == 'button'): ?>
                    <hr class="cta__rule" />
                <?php endif; ?>
                    <p class="cta__copy"><?=$copy ?></p>
                <?php if($type == 'button'): ?>
                    <a href="<?=$button['url'] ?>" class="button"><?=$button['title'] ?></a>
                <?php elseif ($type == 'postcode'): ?>
                    <form class="postcode-search">
                        <input class="postcode-search__input" type="text" placeholder="Enter Postcode" />
                        <button class="postcode-search__button" type="submit">Check your area</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>