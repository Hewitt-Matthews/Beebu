<?php

$title = get_sub_field('title');
$packages = get_sub_field('packages');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>

<div class="js-packages packages section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="packages__inner">
            <h2 class="packages__title"><?=$title ?></h2>
            <div class="packages__grid">
                <?php foreach ($packages as $package): ?>
                    <?php $degree = 0; 
                    
                    if($package['gauge_meter']) {
                        $degree = (180 * $package['gauge_meter']) / 100;
                    }
                    ?>
                    <div class="packages__package">
                        <span class="packages__package-eyebrow"><?=$package['eyebrow'] ?></span>
                        <div class="gauge js-gauge" style="width: 100%; --rotation-2:<?=$degree ?>deg;">
                            <div class="percentage js-percentage"></div>
                            <div class="mask"></div>
                        </div>
                        <div class="packages__package-speed">
                            <span class="packages__package-large"><?=$package['speed'] ?></span>
                            <span>mbps</span>
                            <span class="packages__package-small">Upload and download speed</span>
                        </div>
                        <h3 class="packages__package-title"><?=$package['title'] ?></h3>
                        <ul class="packages__package-specs">
                            <?php foreach ($package['specs'] as $spec): ?>
                                <li class="packages__package-spec"><?=$spec['spec'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="" class="button button--black packages__package-button"><small>From </small><?=$package['price'] ?></a>
                        <span><?=$package['contract_length'] ?></span>
                        <span>*Based on location</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>