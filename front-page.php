<?php include('header.php'); ?>

<main id="maincontent">
    <?php include('flexible-content.php'); ?>

    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
        <?php the_content() ;?>
    <?php endwhile; ?>
    <?php endif; ?>
</main>


<?php include('footer.php'); ?>
