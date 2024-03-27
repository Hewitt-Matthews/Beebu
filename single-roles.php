<?php include('header.php'); ?>

<main id="maincontent" class="single-role">

  <div class="wrapper">

    <?php if ( have_posts() ) : ?>

      <a href="/careers" class="button">Careers</a>
      
      <?php while ( have_posts() ) : the_post(); 
      
        $short_intro = get_field('short_intro');
        $link = get_the_permalink();
        $salary = get_field('salary');
        $position_type = get_field('position_type');
        $copy = get_field('copy');
        $date = get_the_date();

      ?>

        <div class="single-role__content">

          <div class="single-role__content-left">

            <h1 class="single-role__title"><?php the_title(); ?></h1>

            <p class="single-role__salary">
              <?= $salary ?> - <?= $position_type ?>
            </p>

            <p class="single-role__description"><?= $short_intro ?></p>

            <a href="#apply" class="button">Apply for role</a>

            <div class="copy">

              <?= $copy ?>

            </div>

            <?php /******************************************************************************************
             * Social Share
             ******************************************************************************************/
            get_template_part('/template-parts/social-share'); ?>

          </div>

          <div class="single-role__content-right">

            <div class="single-role__meta">

              <div class="date">
                <strong>Date</strong>
                <p><?= $date ?></p>
              </div>

              <div class="type">
                <strong>Type</strong>
                <p><?= $position_type ?></p>
              </div>

              <div class="salary">
                <strong>Salary</strong>
                <p><?= $salary ?></p>
              </div>

              <a href="#apply" class="button button--black">Apply for role</a>

            </div>
          
          </div>

        </div>
            
      <?php endwhile; ?>
      
    <?php endif; ?>

  </div>

  <div class="single-role__form section--off-white section--spaced section--curved" id="apply">

    <div class="wrapper">

      <?php echo do_shortcode('[gravityform id="1" title="false" ajax="true"]'); ?>

    </div>

  </div>

  <?php include('flexible-content.php'); ?>

</main>


<?php include('footer.php'); ?>