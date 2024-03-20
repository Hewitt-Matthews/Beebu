<?php get_header(); ?>

<main id="maincontent">

  <div class="wrapper">
    
    <?php /******************************************************************************************
     * Locations Map
     ******************************************************************************************/
    get_template_part('/template-parts/locations-map'); ?>

    <?php include('flexible-content.php'); ?>

  </div>

</main>

<?php get_footer(); ?>