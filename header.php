<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TR9DNQ4R');</script>
<!-- End Google Tag Manager -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TR9DNQ4R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<a href="#maincontent" class="skip-link">Skip to main content</a>

<header class="header">
    <div class="wrapper">
        <div class="header__inner">
            <div class="header__logo">
            <?php 
              $desktop_logo = get_field('header_nav_image');
              $mobile_logo = get_field('header_nav_image_mobile');
            ?>
            <a href="/">
                <?php if ($desktop_logo && isset($desktop_logo['url'])): ?>
                    <img src="<?= esc_url($desktop_logo['url']); ?>" alt="<?= esc_attr($desktop_logo['alt'] ?? ''); ?>" class="desktop-logo" />
                    <img src="<?= esc_url($mobile_logo && isset($mobile_logo['url']) ? $mobile_logo['url'] : $desktop_logo['url']); ?>" alt="<?= esc_attr($mobile_logo && isset($mobile_logo['alt']) ? $mobile_logo['alt'] : ($desktop_logo['alt'] ?? '')); ?>" class="mobile-logo" />
                <?php else: ?>
                    <?php // Use specific logos based on page type
                    if ( is_page('about') || is_page('contact') || is_home() || is_front_page() ) : ?>
                        <img src="<?=get_template_directory_uri() ?>/assets/img/new-beebu-logo-white.png" class="desktop-logo" />
                        <img src="<?=get_template_directory_uri() ?>/assets/img/new-beebu-logo-white.png" class="mobile-logo" />
                    <?php elseif ( is_404() ) : ?>
                        <img src="<?=get_template_directory_uri() ?>/assets/img/beebu-logo-white.svg" class="desktop-logo" />
                        <img src="<?=get_template_directory_uri() ?>/assets/img/beebu-logo-white.svg" class="mobile-logo" />
                    <?php else : ?>
                        <img src="<?=get_template_directory_uri() ?>/assets/img/new-beebu-logo-black.png" class="desktop-logo" />
                        <img src="<?=get_template_directory_uri() ?>/assets/img/new-beebu-logo-black.png" class="mobile-logo" />
                    <?php endif; ?>
                <?php endif; ?>
            </a>

            </div>
            <nav aria-label="Main Menu">
                <button class="open-button js-open-nav" aria-expanded="false" aria-haspopup="menu" aria-controls="main-menu" aria-label="Open Main Navigation">
                    <!-- <div class="hidden">Open Menu</div> -->
                    

                    <?php // 404, home, about, contact
                  if ( is_404() || is_page('about') || is_page('contact') || is_home() || is_front_page() ) : ?>
                    <span></span>
                    <span></span>
                    <span></span>
                  <?php else : ?>
                    <span class="hamburger--dark"></span>
                    <span class="hamburger--dark"></span>
                    <span class="hamburger--dark"></span>
                  <?php endif; ?>


                </button>
                <!-- <div class="main-menu"> -->
                <div class="header__menu <?php echo get_field('black_links', 'option') ? 'black-links' : ''; ?>">
                    <?php 
                    wp_nav_menu( array('theme_location' => 'main-navigation') ); 
                    ?>
                </div>
            </nav>
        </div>
    </div>
</header>