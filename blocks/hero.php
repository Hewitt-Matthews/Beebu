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

endif; ?>

<div class="hero <?php if ( $hero_type === 'flourish' ) : echo 'flourish-hero'; elseif ( $hero_type === 'green-background' ) : echo 'section--green'; endif; ?>" style="<?php if ( $hero_type === 'background-image' || $hero_type === 'flourish' ) : echo 'background-image: url(' . $background_image['url'] .')'; endif; ?>">

  <div class="wrapper">

    <div class="hero__inner">

      <h1 class="hero__title"><?= $title ?></h1>
      <p class="hero__copy"><?= $copy ?></p>
      
      <?php if ( $postcode_search ) : ?>
        <form class="postcode-search">
          <input class="postcode-search__input" type="text" placeholder="Enter Postcode" />
          <button class="postcode-search__button" type="submit">Check your area</button>
        </form>
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

      <?php if ( $add_page_button ) : ?>
        <a href="<?=$button['url'] ?>" class="button"><?=$button['title'] ?></a>
      <?php endif; ?>
        
    </div>

  </div>

</div>