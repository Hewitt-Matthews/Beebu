<?php 

$title = get_sub_field('title');
$benefits = get_sub_field('benefits');
$description = get_sub_field('description');
$button = get_sub_field('button');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>

<div class="benefits section 
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="benefits__inner">
            <h2 class="benefits__title"><?=$title ?></h2>
            <p class="benefits__description"><?=$description ?></p>
        </div>
        <div class="benefits__grid">
            <?php foreach ($benefits as $benefit): 
                $icon = $benefit['icon'];
                $alt_text = get_post_meta($icon['ID'], '_wp_attachment_image_alt', true);
            ?>
                <div class="benefits__benefit">
                    <img class="benefits__benefit-image" 
                         src="<?= $icon['url'] ?>" 
                         alt="<?= $alt_text ?: $benefit['title'] ?>" />
                    <div>
                        <h2 class="benefits__benefit-title"><?= $benefit['title'] ?></h2>
                        <p class="benefits__benefit-copy"><?= $benefit['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="benefits__footer">
            <a href="<?=$button['url'] ?>" class="button"><?=$button['title'] ?></a>
        </div>
    </div>
</div>