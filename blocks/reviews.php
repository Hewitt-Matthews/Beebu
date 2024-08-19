<?php 

$title = get_sub_field('title');
$reviews_selection = get_sub_field('reviews_selection');
$rating = 5;
$button = get_sub_field('button');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');
$remove_top_spacing = get_sub_field('remove_top_spacing');
?>

<div class="reviews section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  " style=" <?php if ( $remove_top_spacing ) : echo 'margin-top: 0;'; endif; ?>">
    <div class="wrapper">
        <div class="reviews__inner">
            <h2 class="reviews__title"><?=$title ?></h2>
            
            <!-- TrustBox script --> <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script> <!-- End TrustBox script -->
            <!-- TrustBox widget - Slider --> <div class="trustpilot-widget" data-locale="en-GB" data-template-id="54ad5defc6454f065c28af8b" data-businessunit-id="65957e521d1c310aa125e6d5" data-style-height="240px" data-style-width="100%" data-theme="light" data-stars="1,2,3,4,5" data-review-languages="en">   <a href="https://uk.trustpilot.com/review/beebu.co.uk" target="_blank" rel="noopener">Trustpilot</a> </div> <!-- End TrustBox widget -->
        </div>
    </div>
</div>