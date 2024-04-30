<?php 

$title = get_sub_field('title');
$faqs = get_sub_field('faq_selection');
$description = get_sub_field('description');
$button = get_sub_field('button');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>

<div class="help section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
  <div class="wrapper">

    <div class="help__inner">

      <div class="help__content">
        <h2 class="help__title"><?= $title ?></h2>
        <p class="help__description"><?= $description ?></p>
        <?php if ( $button ) : ?>
          <a href="<?= $button['url'] ?>" class="button button--black hide-mobile"><?= $button['title'] ?></a>
        <?php endif; ?>
      </div>

      <div class="help__questions">

        <?php foreach ( $faqs as $faq ) : 

          $title = $faq->post_title;
          $answer = get_field( 'answer', $faq->ID );
          
        ?>

          <div class="help__question">

            <div class="help__question-inner">
              <h5><?= $title ?></h5>
              <button class="help__expand js-question-toggle"></button>
            </div>

            <p class="help__answer"><?= $answer ?></p>

          </div>

        <?php endforeach; ?>

      </div>
      <?php if ( $button ) : ?>
          <a href="<?= $button['url'] ?>" class="button button--black hide-desktop"><?= $button['title'] ?></a>
        <?php endif; ?>
    </div>

  </div>

</div>