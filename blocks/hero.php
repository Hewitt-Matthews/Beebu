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
  $background_image = get_field('hero_background_image', 'options');
  $add_page_button = get_field('hero_add_page_button', 'options');
  $button = $add_page_button ? get_field('hero_button', 'options') : '';

else : 

  $hero_type = get_sub_field('hero_type');
  $title = get_sub_field('title');
  $copy = get_sub_field('copy');
  $postcode_search = get_sub_field('add_postcode_search');
  $trustpilot = get_sub_field('add_trustpilot');
  $background_image = get_sub_field('background_image');
  $add_page_button = get_sub_field('add_page_button');
  $button = $add_page_button ? get_sub_field('button') : '';
  $mobile_image = get_sub_field('mobile_image');
  $mobile_background_colour = get_sub_field('mobile_background_colour');
  $availability_check_url = get_sub_field('availability_check_url');
  $additional_text_below_the_postcode_search = get_sub_field('additional_text_below_the_postcode_search');
  $background_images = get_sub_field('hero_background_images');
  $mobile_images = get_sub_field('mobile_images');

  // Add debugging
  echo '<pre style="display: none;">'; // Hidden but can check source
  echo "Desktop Images:\n";
  var_dump($background_images);
  echo "\nMobile Images:\n";
  var_dump($mobile_images);
  echo '</pre>';

endif; ?>


<div class="hero <?php if ( $hero_type === 'flourish' ) : echo 'flourish-hero'; elseif ( $hero_type === 'green-background' ) : echo 'section--green'; endif; ?>">

  <div class="desktop-slider">
    <?php 
    if ($background_images) :
        foreach ($background_images as $image) : ?>
            <div class="slide">
                <div class="hero-content desktop-hero-content" style="background-image: url('<?php echo esc_url($image['background_image']['url']); ?>');">
                    <div class="wrapper">
                        <div class="hero__inner">
                            <h1 class="hero__title"><?= $title ?></h1>
                            <p class="hero__copy"><?= $copy ?></p>
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
                                    <!-- TrustBox script -->
                                    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
                                    <!-- End TrustBox script -->

                                    <!-- TrustBox widget - Micro Star -->
                                    <div class="trustpilot-widget" 
                                         data-locale="en-GB" 
                                         data-template-id="5419b732fbfb950b10de65e5" 
                                         data-businessunit-id="65957e521d1c310aa125e6d5" 
                                         data-style-height="24px" 
                                         data-style-width="100%" 
                                         data-theme="dark">
                                        <a href="https://uk.trustpilot.com/review/beebu.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                                    </div>
                                    <!-- End TrustBox widget -->
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif; ?>
  </div>

  <div class="wrapper">
    <div class="hero__inner">

      <!-- <div class="hero__mobile-image hide-desktop">
        <img src="<?= $mobile_image['url'] ?>" alt="">
      </div>  -->

      <h1 class="hero__title"><?= $title ?></h1>
      <p class="hero__copy"><?= $copy ?></p>
      
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
          <!-- TrustBox script -->
          <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
          <!-- End TrustBox script -->

          <!-- TrustBox widget - Micro Star -->
          <div class="trustpilot-widget" 
               data-locale="en-GB" 
               data-template-id="5419b732fbfb950b10de65e5" 
               data-businessunit-id="65957e521d1c310aa125e6d5" 
               data-style-height="24px" 
               data-style-width="100%" 
               data-theme="dark">
            <a href="https://uk.trustpilot.com/review/beebu.co.uk" target="_blank" rel="noopener">Trustpilot</a>
          </div>
          <!-- End TrustBox widget -->
        </div>
      <?php endif; ?>
        
    </div>
  </div>

</div>

<div class="mobile__hero">
    <?php 
    // Debug output
    echo "<!-- Number of mobile images: " . count($mobile_images) . " -->";
    ?>
    
    <div class="mobile-slider">
        <?php 
        if ($mobile_images) :
            $slide_count = 0;
            foreach ($mobile_images as $image) : 
                $slide_count++;
                ?>
                <div class="slide">
                    <?php 
                    // Debug output for each slide
                    echo "<!-- Slide {$slide_count} URL: " . esc_url($image['mobile_image']['url']) . " -->";
                    ?>
                    <div class="hero-content mobile-hero-content" style="background-image: url('<?php echo esc_url($image['mobile_image']['url']); ?>');">
                        <div class="wrapper">
                            <div class="hero__inner">
                                <h1 class="hero__title"><?= $title ?></h1>
                                <p class="hero__copy"><?= $copy ?></p>
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
                                        <!-- TrustBox script -->
                                        <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
                                        <!-- End TrustBox script -->

                                        <!-- TrustBox widget - Micro Star -->
                                        <div class="trustpilot-widget" 
                                             data-locale="en-GB" 
                                             data-template-id="5419b732fbfb950b10de65e5" 
                                             data-businessunit-id="65957e521d1c310aa125e6d5" 
                                             data-style-height="24px" 
                                             data-style-width="100%" 
                                             data-theme="dark">
                                            <a href="https://uk.trustpilot.com/review/beebu.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                                        </div>
                                        <!-- End TrustBox widget -->
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>
</div>

<style>
.mobile__hero {
    width: 100%;
    height: 100vh;
}

.mobile-slider {
    height: 100vh;
}

.mobile-slider .slide {
    height: 100vh !important;
}

.mobile-hero-content {
    height: 100vh !important;
    background-size: cover !important;
    background-position: center !important;
    background-repeat: no-repeat !important;
}

/* Slick specific styles */
.mobile-slider .slick-list,
.mobile-slider .slick-track {
    height: 100% !important;
}

.mobile-slider .slick-dots {
    bottom: 25px;
    z-index: 1;
}

.mobile-slider .slick-dots li button:before {
    color: white;
}

@media (max-width: 767px) {
    .hero {
        display: none !important;
    }
    .mobile__hero {
        display: block !important;
    }
}

/* Reset any existing slider styles */
.mobile-slider {
    opacity: 1 !important;
    visibility: visible !important;
}

.mobile-slider .slide {
    opacity: 1 !important;
    position: relative !important;
}

/* Basic slider setup */
.mobile-slider {
    width: 100%;
    height: 100vh;
}

.mobile-hero-content {
    height: 100vh;
    background-size: cover;
    background-position: center;
}

/* Essential Slick styles */
.slick-list, .slick-track {
    height: 100%;
}

.slick-slide {
    height: 100vh;
}

.slick-dots {
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: center;
    z-index: 1;
}

.slick-dots li {
    display: inline-block;
    margin: 0 5px;
}

@media (max-width: 767px) {
    .hero {
        display: none !important;
    }
    .mobile__hero {
        display: block !important;
    }
}

/* Desktop styles */
.desktop-slider {
    width: 100%;
    height: 100vh;
}

.desktop-hero-content {
    height: 100vh;
    background-size: cover;
    background-position: center;
}

/* Mobile styles */
.mobile-slider {
    width: 100%;
    height: 100vh;
}

.mobile-hero-content {
    height: 100vh;
    background-size: cover;
    background-position: center;
}

/* Common Slick styles */
.slick-list, 
.slick-track {
    height: 100%;
}

.slick-slide {
    height: 100vh;
}

.slick-dots {
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: center;
    z-index: 1;
}

.slick-dots li {
    display: inline-block;
    margin: 0 5px;
}

/* Media queries */
@media (min-width: 768px) {
    .mobile__hero {
        display: none !important;
    }
    .hero {
        display: block !important;
    }
}

@media (max-width: 767px) {
    .hero {
        display: none !important;
    }
    .mobile__hero {
        display: block !important;
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // Initialize both sliders independently
    function initSliders() {
        // Desktop Slider
        if (!$('.desktop-slider').hasClass('slick-initialized')) {
            $('.desktop-slider').slick({
                dots: true,
                arrows: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 3000
            });
            console.log('Desktop slider initialized');
        }

        // Mobile Slider
        if (!$('.mobile-slider').hasClass('slick-initialized')) {
            $('.mobile-slider').slick({
                dots: true,
                arrows: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: false,
                speed: 300,
                autoplay: true,
                autoplaySpeed: 3000
            });
            console.log('Mobile slider initialized');
        }
    }

    // Initialize on page load
    initSliders();

    // Handle resize
    var resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            // Destroy both sliders
            if ($('.desktop-slider').hasClass('slick-initialized')) {
                $('.desktop-slider').slick('unslick');
            }
            if ($('.mobile-slider').hasClass('slick-initialized')) {
                $('.mobile-slider').slick('unslick');
            }
            // Reinitialize both
            initSliders();
        }, 250);
    });
});
</script>