<?php

$title = get_sub_field('title');
$packages = get_sub_field('packages');

?>

<div class="wrapper">
    <div class="packages">
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
                    <div class="gauge" style="width: 100%; --rotation:<?=$degree ?>deg;">
                        <div class="percentage"></div>
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