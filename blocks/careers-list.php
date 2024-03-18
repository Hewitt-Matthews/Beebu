<?php 

$title = get_sub_field('title');
$copy = get_sub_field('copy');
$no_careers_message = get_sub_field('no_careers_message');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

$args = array(
  'post_type' => 'roles',
  'posts_per_page' => -1,
);

$careers_query = new WP_Query( $args ); ?>

<div class="careers-list section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
      <div class="careers-list__inner">
        <h2 class="careers-list__title"><?= $title ?></h2>
        <p class="careers-list__description"><?= $copy ?></p>
      </div>
      <div class="careers-list__list">

        <?php if ( $careers_query->have_posts() ) :
          while ( $careers_query->have_posts() ) : $careers_query->the_post(); 
          
            $title = get_the_title();
            $short_intro = get_field('short_intro');
            $link = get_the_permalink();
            $salary = get_field('salary');
            $position_type = get_field('position_type');
          
          ?>

            <a href="<?= $link ?>">
              <div class="careers-list__career">
                <h3 class="career__title"><?= $title ?></h3>
                <p class="career__salary">
                  <?= $salary ?> - <?= $position_type ?>
                </p>
                <p class="career__description"><?= $short_intro ?></p>
              </div>
            </a>

          <?php endwhile; wp_reset_postdata();
          else: 

            $button = $no_careers_message['button'];
          
          ?>

            <div class="careers-list__career">
              <h3 class=""><?= $no_careers_message['title']; ?></h3>
              <a href="<?= $button['url'] ?>" class="button"><?= $button['title'] ?></a>
            </div>

          <?php endif; ?>

      </div>
    </div>
</div>