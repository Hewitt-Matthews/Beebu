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
  
  // A fix to hide the warning messages on a 404 page
  $background_images = get_field('hero', 'options')['hero_background_images'];
  $mobile_images = get_field('hero', 'options')['mobile_images'];
  $mobile_title = $title;
  $mobile_copy = $copy;
  $additional_text_below_the_postcode_search = '';

else : 

  $hero_type = get_sub_field('hero_type');
  $title = get_sub_field('title');
  $mobile_title = get_sub_field('mobile_title');
  $copy = get_sub_field('copy');
  $mobile_copy = get_sub_field('mobile_copy');
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

endif; ?>


<!--Desktop Hero-->
<div class="hero">
    <div class="desktop-slider <?php if ($hero_type === 'flourish'): echo 'flourish-hero'; elseif ($hero_type === 'green-background'): echo 'section--green'; endif; ?>">
        <?php 
        if ($background_images && $hero_type !== 'green-background'): // Only show background images if not green background
            foreach ($background_images as $image): 
                $desktop_alt_text = get_post_meta($image['background_image']['ID'], '_wp_attachment_image_alt', true);
            ?>
                <div class="slide" 
                     style="background-image: url('<?php echo esc_url($image['background_image']['url']); ?>');"
                     role="img" 
                     aria-label="<?= $desktop_alt_text ?: $image['title'] ?>">
                </div>
            <?php endforeach;
        elseif ($hero_type === 'green-background' || $hero_type === 'flourish'): // Add a single slide for green background or flourish ?>
            <div class="slide"></div>
        <?php endif; ?>
    </div>

    <?php if ($hero_type === 'flourish'): ?>
        <div class="hero__flourish"></div>
    <?php endif; ?>

    <div class="wrapper">
        <div class="hero__inner">
            <div class="hero__content">
                <?php if ($background_images && $hero_type !== 'green-background'): ?>
                    <?php foreach ($background_images as $index => $image): ?>
                        <div class="hero__slide-content <?= $index === 0 ? 'active' : '' ?>">
                            <?php if ($image['title']): ?>
                                <h1 class="hero__title"><?= $image['title'] ?></h1>
                            <?php endif; ?>
                            <?php if ($image['copy']): ?>
                                <p class="hero__copy"><?= $image['copy'] ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: // Green background or no images ?>
                    <div class="hero__slide-content active">
                        <?php if ($title): ?>
                            <h1 class="hero__title"><?= $title ?></h1>
                        <?php endif; ?>
                        <?php if ($copy): ?>
                            <p class="hero__copy"><?= $copy ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if ($postcode_search): ?>
                <form class="postcode-search" method="GET" action="<?php echo esc_url($availability_check_url); ?>"> 
                    <input class="postcode-search__input" type="text" name="postcode" value="<?php echo isset($_GET['postcode']) ? esc_attr($_GET['postcode']) : ''; ?>" placeholder="Enter your postcode" required> 
                    <?php if (isset($_GET['utm_source']) && $_GET['utm_source'] === 'awin'): ?>
                        <input class="postcode-search__input" type="hidden" name="utm_source" value="awin"> 
                        <?php if (isset($_GET['awc'])): ?>
                            <input class="postcode-search__input" type="hidden" name="awc" value="<?php echo esc_attr($_GET['awc']); ?>">
                        <?php endif; ?>
                    <?php endif; ?>
                    <button class="postcode-search__button" type="submit">Check Availability</button>
                </form>
            <?php endif; ?>

            <?php if ($additional_text_below_the_postcode_search): ?>
                <div class="hero__text-below-postcode">
                    <?php echo $additional_text_below_the_postcode_search; ?>
                </div>
            <?php endif; ?>

            <?php if ($add_page_button) : ?>
                <a href="<?=$button['url'] ?>" class="button <?php if ($hero_type === 'flourish') : ?> button--black <?php endif; ?>"><?=$button['title'] ?></a>
            <?php endif; ?>

            <?php if ($trustpilot) : ?>
                <div class="hero__trustpilot">
                    <!-- TrustBox script -->
                    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
                    <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b732fbfb950b10de65e5" data-businessunit-id="65957e521d1c310aa125e6d5" data-style-height="24px" data-style-width="100%" data-theme="dark">
                        <a href="https://uk.trustpilot.com/review/beebu.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!--Mobile Hero-->
<div class="mobile__hero">
    <div class="mobile-slider <?php if ($hero_type === 'flourish'): echo 'flourish-hero'; elseif ($hero_type === 'green-background'): echo 'section--green'; endif; ?>">
        <?php 
        if ($mobile_images && $hero_type !== 'green-background'): // Only show background images if not green background
            foreach ($mobile_images as $image): 
                $mobile_alt_text = get_post_meta($image['mobile_image']['ID'], '_wp_attachment_image_alt', true);
            ?>
                <div class="slide" 
                     style="background-image: url('<?php echo esc_url($image['mobile_image']['url']); ?>');"
                     role="img" 
                     aria-label="<?= $mobile_alt_text ?: $image['title'] ?>">
                </div>
            <?php endforeach;
        elseif ($hero_type === 'green-background' || $hero_type === 'flourish'): // Add a single slide for green background or flourish ?>
            <div class="slide"></div>
        <?php endif; ?>
    </div>

    <?php if ($hero_type === 'flourish'): ?>
        <div class="hero__flourish"></div>
    <?php endif; ?>

    <div class="wrapper">
        <div class="hero__inner">
            <div class="hero__content">
                <?php if ($mobile_images && $hero_type !== 'green-background'): ?>
                    <?php foreach ($mobile_images as $index => $image): ?>
                        <div class="hero__slide-content <?= $index === 0 ? 'active' : '' ?>">
                            <?php if ($image['title']): ?>
                                <h1 class="hero__title"><?= $image['title'] ?></h1>
                            <?php endif; ?>
                            <?php if ($image['copy']): ?>
                                <p class="hero__copy"><?= $image['copy'] ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: // Green background or no images ?>
                    <div class="hero__slide-content active">
                        <?php if ($mobile_title): ?>
                            <h1 class="hero__title"><?= $mobile_title ?></h1>
                        <?php endif; ?>
                        <?php if ($mobile_copy): ?>
                            <p class="hero__copy"><?= $mobile_copy ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if ($postcode_search): ?>
                <form class="postcode-search" method="GET" action="<?php echo esc_url($availability_check_url); ?>"> 
                    <input class="postcode-search__input" type="text" name="postcode" value="<?php echo isset($_GET['postcode']) ? esc_attr($_GET['postcode']) : ''; ?>" placeholder="Enter postcode" required> 
                    <?php if (isset($_GET['utm_source']) && $_GET['utm_source'] === 'awin'): ?>
                        <input class="postcode-search__input" type="hidden" name="utm_source" value="awin"> 
                        <?php if (isset($_GET['awc'])): ?>
                            <input class="postcode-search__input" type="hidden" name="awc" value="<?php echo esc_attr($_GET['awc']); ?>">
                        <?php endif; ?>
                        <?php if (isset($_GET['sn'])): ?>
                            <input class="postcode-search__input" type="hidden" name="sn" value="<?php echo esc_attr($_GET['sn']); ?>">
                        <?php endif; ?>
                    <?php endif; ?>
                    <button class="postcode-search__button mobile-button" type="submit"><i class="fas fa-angle-right"></i></button>
                </form>
            <?php endif; ?>

            <?php if ($additional_text_below_the_postcode_search): ?>
                <div class="hero__text-below-postcode">
                    <?php echo $additional_text_below_the_postcode_search; ?>
                </div>
            <?php endif; ?>

            <?php if ($add_page_button) : ?>
                <a href="<?=$button['url'] ?>" class="button <?php if ($hero_type === 'flourish') : ?> button--black <?php endif; ?>"><?=$button['title'] ?></a>
            <?php endif; ?>

            <?php if ($trustpilot) : ?>
                <div class="hero__trustpilot">
                    <!-- TrustBox script -->
                    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
                    <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b732fbfb950b10de65e5" data-businessunit-id="65957e521d1c310aa125e6d5" data-style-height="24px" data-style-width="100%" data-theme="dark">
                        <a href="https://uk.trustpilot.com/review/beebu.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Initialize sliders only once
    if (!$('.desktop-slider').hasClass('slick-initialized')) {
        $('.desktop-slider, .hero__content').slick({
            dots: false,
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 1000, // Speed of the slide transition
            autoplay: true,
            autoplaySpeed: 5000, // Each slide is shown for 5 seconds
            asNavFor: '.hero__content' // This syncs the content with the background
        });
    }

    if (!$('.mobile-slider').hasClass('slick-initialized')) {
        $('.mobile-slider, .mobile__hero .hero__content').slick({
            dots: false,
            arrows: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 1000, // Speed of the slide transition
            autoplay: true,
            autoplaySpeed: 5000, // Each slide is shown for 5 seconds
            asNavFor: '.mobile__hero .hero__content' // This syncs the content with the background
        });
    }
});
</script>