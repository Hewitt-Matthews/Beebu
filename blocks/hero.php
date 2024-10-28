<?php $rating = 5; 

/******************************************************************************************
 * 404 Page Check
 ******************************************************************************************/
if ( is_404() ) :

  $hero_type = get_field('hero_hero_type', 'options');
  $title = get_field('hero_title', 'options');
  $copy = get_field('hero_copy', 'options');
  $postcode_search = get_field('hero_add_postcode_search', 'options');
  $trustpilot = get_field('hero_add_trustpilot', 'options');
  $add_page_button = get_field('hero_add_page_button', 'options');
  $button = $add_page_button ? get_field('hero_button', 'options') : '';

else : 

  $hero_type = get_sub_field('hero_type');
  $title = get_sub_field('title');
  $copy = get_sub_field('copy');
  $postcode_search = get_sub_field('add_postcode_search');
  $trustpilot = get_sub_field('add_trustpilot');
  $add_page_button = get_sub_field('add_page_button');
  $button = $add_page_button ? get_sub_field('button') : '';
  $mobile_image = get_sub_field('mobile_image');
  $mobile_background_colour = get_sub_field('mobile_background_colour');
  $availability_check_url = get_sub_field('availability_check_url');
  $additional_text_below_the_postcode_search = get_sub_field('additional_text_below_the_postcode_search');

endif; ?>

<?php 
// Get the repeater field for hero background images
$slides = get_sub_field('hero_background_images'); // Correctly access the repeater field

// Create an array of image URLs
$image_urls = [];
if (!empty($slides)) {
    foreach ($slides as $slide) {
        if (isset($slide['background_image']['url'])) {
            $image_urls[] = esc_url($slide['background_image']['url']);
        }
    }
}

// Initialize the background image URL for the first slide
$background_image_url = !empty($image_urls) ? $image_urls[0] : '';
?>

<div class="hero <?php if ( $hero_type === 'flourish' ) : echo 'flourish-hero'; elseif ( $hero_type === 'green-background' ) : echo 'section--green'; endif; ?>" style="background-image: url('<?= $background_image_url ?>');">
    <div class="wrapper hero-slider">
        <div class="slick-slider">
            <?php if (!empty($slides)): // Check if there are slides ?>
                <?php foreach ($slides as $slide): // Loop through each slide ?>
                <div class="slide"> <!-- Each slide can be empty since we are using the hero div for the background -->
                    <div class="hero__inner">
                        <h1 class="hero__title"><?= esc_html($title) ?></h1> <!-- Keep the same title -->
                        <p class="hero__copy"><?= esc_html($copy) ?></p> <!-- Keep the same copy -->
                        
                        <?php if ($postcode_search): ?>
                          <form class="postcode-search" method="GET" action="<?php echo esc_url($availability_check_url); ?>"> 
                            <input class="postcode-search__input" type="text" name="postcode" value="<?php echo isset($_GET['postcode']) ? esc_attr($_GET['postcode']) : ''; ?>" placeholder="Enter your postcode" required> 
                            <button class="postcode-search__button" type="submit">Check Availability</button>
                          </form>
                        <?php endif; ?>

                        <?php if ( $additional_text_below_the_postcode_search ): ?>
                          <p class="hero__text-below-postcode"><?= $additional_text_below_the_postcode_search ?></p>
                        <?php endif; ?>

                        <?php if ( $add_page_button ) : ?>
                          <a href="<?=$button['url'] ?>" class="button <?php if ( $hero_type === 'flourish' ) : ?> button--black <?php endif; ?>"><?=$button['title'] ?></a>
                        <?php endif; ?>

                        <?php if ( $trustpilot ) : ?>
                          <div class="hero__trustpilot">
                            <span>Excellent</span>
                            <div class="reviews__score">
                              <?php for ($i=0; $i < $rating; $i++): ?>
                                <span class="reviews__star"><img src="<?=get_template_directory_uri() ?>/assets/img/star.svg" /></span>
                              <?php endfor; ?>
                            </div>
                            <img src="<?=get_template_directory_uri() ?>/assets/img/trustpilot-white.svg" />
                          </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No slides available.</p> <!-- Fallback message if no slides -->
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    var $hero = $('.hero'); // Cache the hero div
    var $slickSlider = $('.slick-slider');

    // Initialize Slick Slider
    $slickSlider.slick({
      dots: true, // Show dots for navigation
      arrows: false, // Hide arrows
      infinite: true, // Infinite looping
      speed: 500, // Transition speed
      slidesToShow: 1, // Number of slides to show
      slidesToScroll: 1, // Number of slides to scroll
      autoplay: true, // Enable autoplay
      autoplaySpeed: 3000, // Time between slides (in milliseconds)
      pauseOnHover: true, // Pause autoplay on hover
      responsive: [
        {
          breakpoint: 768, // Tablet
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480, // Mobile
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    // Change the background image of the hero div on slide change
    $slickSlider.on('afterChange', function(event, slick, currentSlide){
      // Check if the image URLs array is not empty
      if (<?= json_encode($image_urls) ?>.length > 0) {
        // Get the background image URL from the image array
        var newBackgroundImage = <?= json_encode($image_urls) ?>[currentSlide]; // Get the URL for the current slide
        
        // Set the new background image on the hero div
        $hero.css('background-image', 'url(' + newBackgroundImage + ')'); // Set the new background image
      } else {
        console.warn('No background images available.');
      }
    });
  });
</script>
