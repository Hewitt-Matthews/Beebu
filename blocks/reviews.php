<?php 

$title = get_sub_field('title');
$reviews_selection = get_sub_field('reviews_selection');
$rating = 5;
$button = get_sub_field('button');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>

<div class="reviews section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="reviews__inner">
            <h2 class="reviews__title"><?=$title ?></h2>
            <div class="reviews__grid">
                <?php foreach ($reviews_selection as $review): ?>
                    <div class="reviews__review">
                        <div class="reviews__score">
                            <?php for ($i=0; $i < $review->stars; $i++): ?>
                                <span class="reviews__star"><img src="<?=get_template_directory_uri() ?>/assets/img/star.svg" /></span>
                            <?php endfor; ?>
                        </div>
                        <div class="reviews__review-content">
                            <h4 class="reviews__review-title"><?=$review->post_title ?></h4>
                            <p class="reviews__review-copy"><?=$review->copy ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="reviews__footer">
            <div class="reviews__trustpilot">
                <span>Excellent</span>
                <div class="reviews__score">
                    <?php for ($i=0; $i < $rating; $i++): ?>
                        <span class="reviews__star"><img src="<?=get_template_directory_uri() ?>/assets/img/star.svg" /></span>
                    <?php endfor; ?>
                </div>
                <img src="<?=get_template_directory_uri() ?>/assets/img/trustpilot.svg" />
            </div>
            <?php if ( $button ) : ?>
              <a href="<?=$button['url'] ?>" class="button button--black"><?=$button['title'] ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>