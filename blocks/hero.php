<?php $rating = 5; ?>

<div class="hero" style="background-image: url('<?=get_sub_field('background_image')['url']; ?>');">
    <div class="wrapper">
        <div class="hero__inner">
            <h1 class="hero__title"><?=get_sub_field('title'); ?></h1>
            <p class="hero__copy"><?=get_sub_field('copy'); ?></p>
            
            <form class="postcode-search">
                <input class="postcode-search__input" type="text" placeholder="Enter Postcode" />
                <button class="postcode-search__button" type="submit">Check your area</button>
            </form>

            <div class="hero__trustpilot">
                <span>Excellent</span>
                <div class="reviews__score">
                    <?php for ($i=0; $i < $rating; $i++): ?>
                        <span class="reviews__star"><img src="<?=get_template_directory_uri() ?>/assets/img/star.svg" /></span>
                    <?php endfor; ?>
                </div>
                <img src="<?=get_template_directory_uri() ?>/assets/img/trustpilot-white.svg" />
            </div>
        </div>
    </div>
</div>