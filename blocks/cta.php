<?php

$type = 'postcode';

if ( get_sub_field('cta_type') ) {

    $type = 'button';

}

$remove_line = get_sub_field('remove_line');

// Get the custom availability check URL

$availability_check_url = get_sub_field('availability_check_url');

$flourish           = get_sub_field('show_background_flourish');

$flourish_colour    = $flourish ? get_sub_field('flourish_colour') : null;

$mask               = get_sub_field('show_background_mask');

$button             = get_sub_field('button');

$title              = get_sub_field('title');

$copy               = get_sub_field('copy');

$section_bg_colour  = get_sub_field('section_options_background_colour');

$curved_section     = get_sub_field('section_options_curved_section');

$section_padding    = get_sub_field('section_padding');

$background_pos_x   = get_sub_field('background_position_x');

$background_image   = get_sub_field('background_image')['url'];

// Get mobile background image

$mobile_background = get_sub_field('mobile_background_image');

$mobile_background = $mobile_background ? $mobile_background['url'] : $background_image;

?>

<div class="ctacontainer section

    <?php echo 'section--' . $section_bg_colour; ?>

    <?php if ( $curved_section ) : ?> section--curved <?php endif; ?>

    <?php if ( $section_padding ) : ?> section--spaced <?php endif; ?>

">

    <div class="wrapper">

        <div class="cta cta--<?= $type ?>">

            <div class="cta__background-image is-desktop" style="background-image: url('<?= $background_image; ?>');"></div>

            <div class="cta__background-image is-mobile" style="background-image: url('<?= $mobile_background; ?>'); <?php if ( $background_pos_x ) : ?> background-position-x: <?= $background_pos_x ?>%; <?php endif; ?>"></div>

            <?php if ( $mask ) : ?>

                <div class="cta__mask"></div>

            <?php endif; ?>

            <?php if ( $flourish ) : ?>

                <?php if ( $flourish_colour ) : ?>

                    <div class="cta__flourish"></div>

                <?php else : ?>

                    <div class="cta__flourish-clear"></div>

                <?php endif; ?>

            <?php endif; ?>

            <div class="cta__inner">

                <h2 class="cta__title"><?= $title ?></h2>

                <?php if ( $type == 'button' && !$remove_line ) : ?>

                    <hr class="cta__rule" />

                <?php endif; ?>

                <p class="cta__copy"><?= $copy ?></p>

                <?php if ( $type == 'button' ) : ?>

                    <?php if ( !empty($button) ) : ?>

                        <a href="<?= $button['url'] ?>" class="button"><?= $button['title'] ?></a>

                    <?php endif; ?>

                <?php elseif ( $type == 'postcode' ) : ?>

                    <form class="postcode-search" method="GET" action="<?= esc_url($availability_check_url); ?>">

                        <input class="postcode-search__input" type="text" name="postcode" value="<?= isset($_GET['postcode']) ? esc_attr($_GET['postcode']) : ''; ?>" placeholder="Enter postcode" required>

                        <?php if ( isset($_GET['utm_source']) && $_GET['utm_source'] === 'awin' ) : ?>

                            <input class="postcode-search__input" type="hidden" name="utm_source" value="awin">

                            <?php if ( isset($_GET['awc']) ) : ?>

                                <input class="postcode-search__input" type="hidden" name="awc" value="<?= esc_attr($_GET['awc']); ?>">

                            <?php endif; ?>

                        <?php endif; ?>

                        <button class="postcode-search__button" type="submit">Check Availability</button>

                        <button class="postcode-search__button mobile-button" type="submit"><i class="fas fa-angle-right"></i></button>

                    </form>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>