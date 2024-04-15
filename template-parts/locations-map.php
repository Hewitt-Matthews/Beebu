<?php

$title = get_field('title');
$copy = get_field('copy');
$locations = get_field('locations');

if ( $locations ) : ?>

  <div class="locations-map section section--spaced">

    <div class="wrapper">

      <div class="locations-map__locations">

        <h1><?= $title ?></h1>

        <p><?= $copy ?></p>

        <?php foreach( $locations as $location ) :
        
          $location_name = $location['location_name'];

        ?>

          <div class="area-name">

            <?= $location_name ?>

          </div>

        <?php endforeach; ?>

      </div>

      <div class="locations-map__map">

        <?php foreach( $locations as $location ) :
      
          $location_name = $location['location_name'];
          $map_x_coordinates = $location['map_x_coordinates'];
          $map_y_coordinates = $location['map_y_coordinates'];

        ?>

          <div class="area">

            <img src="<?=get_template_directory_uri() ?>/assets/img/location.png" class="marker" />

          </div>

        <?php endforeach; ?>

      </div>

    </div>

  </div>

<?php endif; ?>