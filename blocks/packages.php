<?php

$title = get_sub_field('title');
$title_colour = get_sub_field('title_colour');
$packages = get_sub_field('packages');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

$next_year = date('Y', strtotime('+1 year'));

?>

<div class="js-packages packages section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="packages__inner">
            <h2 class="packages__title <?php if($title_colour) : ?><?= $title_colour ?><?php endif; ?>"><?=$title ?></h2>
            <div class="packages__grid js-packages-slider">
                <?php foreach ($packages as $package): ?>
                    <?php $degree = 0; 
                    
                    if($package['gauge_meter']) {
                        $degree = (($package['gauge_meter'] * 180) / 100) - 45;
                    }
                    ?>
                    <div class="packages__package">
                        <!-- <span class="packages__package-eyebrow"><?=$package['eyebrow'] ?></span> -->
                        

                        <div class="speedbox js-gauge">
                            <div class="speedbox__score js-score" data-rotation="<?=$degree ?>"></div>
                            <div class="speedbox__groove"></div>
                            <div class="speedbox__base"></div>
                        </div>


                        <div class="packages__package-speed">
                            <span class="packages__package-large"><?=$package['speed'] ?></span>
                            <span>Mbps</span>
                            <span class="packages__package-small">Download and upload speed</span>
                        </div>
                        <h3 class="packages__package-title"><?=$package['title'] ?></h3>
                        <ul class="packages__package-specs">
                            <?php foreach ($package['specs'] as $spec): ?>
                                <li class="packages__package-spec"><?=$spec['spec'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="https://signup.beebu.co.uk/signup/postcode" target="_blank" class="button button--black packages__package-button"><small>From </small><?=$package['price'] ?></a>
                        <span><?=$package['contract_length'] ?></span>
                        <span><?= !empty($package['based_on_location_message']) ? $package['based_on_location_message'] : '*Based on location' ?></span>
                        <span><?= !empty($package['monthly_price_rise_message']) ? $package['monthly_price_rise_message'] : '**Monthly price will rise each year by the Retail Price Index (RPI) rate of inflation published in January of that year, beginning from April 2025.' ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        const packagesSlider = $('.js-packages-slider');
        
    function initPackagesSlider() {
        if (window.innerWidth < 768) {
            if (!packagesSlider.hasClass('slick-initialized')) {
                packagesSlider.slick({
                    dots: false,
                    arrows: false,
                    infinite: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    adaptiveHeight: true,
                    variableWidth: false,
                    cssEase: 'linear'
                });
            }
        } else {
            if (packagesSlider.hasClass('slick-initialized')) {
                packagesSlider.slick('unslick');
            }
        }
    }

    // Initialize on page load
    initPackagesSlider();

    // Re-initialize on window resize
        $(window).on('resize', function() {
            initPackagesSlider();
        });
    });
</script>