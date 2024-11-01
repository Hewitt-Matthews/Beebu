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
  if ($background_images) :
      foreach ($background_images as $image) :
          $background_image = $image['background_image'];
          break; // Assuming you only want the first image
      endforeach;
  endif;

endif; ?>


<div class="hero <?php if ( $hero_type === 'flourish' ) : echo 'flourish-hero'; elseif ( $hero_type === 'green-background' ) : echo 'section--green'; endif; ?>">

  <div class="hero-slider" style="display: none;">
    <?php 
    $background_images = get_sub_field('hero_background_images');
    if ($background_images) :
        foreach ($background_images as $image) : ?>
            <div class="hero-slide" data-bg="<?= esc_url($image['background_image']['url']) ?>"></div>
        <?php endforeach;
    endif;
    ?>
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

<div class="hero mobile__hero <?php if ( $hero_type === 'flourish' ) : echo 'flourish-hero'; elseif ( $hero_type === 'green-background' ) : echo 'section--green'; endif; ?>">

  <div class="hero-slider" style="display: none;">
    <?php 
    $mobile_images = get_sub_field('mobile_images');
    if ($mobile_images) :
        foreach ($mobile_images as $image) : ?>
            <div class="hero-slide" data-bg="<?= esc_url($image['mobile_image']['url']) ?>"></div>
        <?php endforeach;
    endif;
    ?>
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

<script type="text/javascript">
  jQuery(document).ready(function($){
    var $hero = $('.hero');
    var $slider = $('.hero-slider');

    $slider.slick({
      dots: true,
      infinite: true,
      speed: 500,
      cssEase: 'linear',
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false // Optional: Hide navigation arrows if not needed
    });

    // Set initial background
    var initialBg = $slider.find('.hero-slide').eq(0).data('bg');
    $hero.css('background-image', 'url(' + initialBg + ')');

    // Update background on slide change
    $slider.on('afterChange', function(event, slick, currentSlide){
      var currentBg = $slider.find('.hero-slide').eq(currentSlide).data('bg');
      $hero.css('background-image', 'url(' + currentBg + ')');
    });
  });
</script>