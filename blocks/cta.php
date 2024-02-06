<?php

$type = 'postcode';
if(get_sub_field('cta_type')) {
    $type = 'button';
}

?>

<div class="wrapper">
    <div class="cta cta--<?=$type ?>" style="background-image: url('<?=get_sub_field('background_image')['url']; ?>');">
        <h2 class="cta__title"><?=get_sub_field('title'); ?></h2>
        <p class="cta__copy"><?=get_sub_field('copy'); ?></p>
        <?php if($type == 'button'): ?>
            <a class="button" href="#">Button</a>
        <?php elseif ($type == 'postcode'): ?>
            <form class="postcode-search">
                <input class="postcode-search__input" type="text" placeholder="Enter Postcode" />
                <button class="postcode-search__button" type="submit">Check your area</button>
            </form>
        <?php endif; ?>
    </div>
</div>