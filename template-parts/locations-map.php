<?php

$title = get_field('title');
$copy = get_field('copy');
$locations = get_field('locations');

// Group locations by region
$regions = [];

if ($locations) {
    foreach ($locations as $location) {
        $region = $location['region'];
        $region_value = $region['value']; // Use this for data-region attribute
        $region_label = $region['label']; // Use this for displaying in the H3

        if (!isset($regions[$region_value])) {
            $regions[$region_value] = [
                'label' => $region_label,
                'locations' => []
            ];
        }
        $regions[$region_value]['locations'][] = $location;
    }
}

if ($locations) : ?>

  <div class="locations-map section section--spaced">

    <div class="wrapper">

      <div class="locations-map__locations">

        <h1><?= $title ?></h1>

        <p><?= $copy ?></p>

        <?php foreach ($regions as $region_value => $region_data) : ?>
          <div class="map-accordion" data-region="<?= $region_value ?>">
            <div class="map-accordion__header">
              <h3><?= $region_data['label'] ?></h3>
              <div class="map-accordion__icon">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <line x1="12" y1="0.5" x2="12" y2="24.5" stroke="black" stroke-width="2"/>
                  <line x1="24" y1="12.5" x2="-5.24537e-08" y2="12.5" stroke="black" stroke-width="2"/>
                </svg>
              </div>
            </div>
            <div class="map-accordion__inner">
            <?php foreach ($region_data['locations'] as $location) :
              $location_name = $location['location_name'];
            ?>
              <div class="area-name js-map-name" data-location="<?= $location_name ?>" data-region="<?= $region_value ?>">
                <?= $location_name ?>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <div class="locations-map__map">
        
        <img src="<?= get_template_directory_uri() ?>/assets/img/map.png">

        <?php foreach ($locations as $location) :
        
          $location_name = $location['location_name'];
          $map_x_coordinates = $location['map_x_coordinates'];
          $map_y_coordinates = $location['map_y_coordinates'];
        
        ?>

          <div class="area js-area-marker" data-location="<?= $location_name ?>" style="left:<?= $map_x_coordinates ?>%; top: <?= $map_y_coordinates ?>%;">
            <img src="<?= get_template_directory_uri() ?>/assets/img/location.png" class="marker"/>
          </div>

        <?php endforeach; ?>

      </div>

    </div>

  </div>

<?php endif; ?>
