<?php 

$title = get_sub_field('title');
$benefits = get_sub_field('benefits');
$description = get_sub_field('description');
$button = get_sub_field('button');

?>

<div class="benefits">
    <div class="wrapper">
        <div class="benefits__inner">
            <h1 class="benefits__title"><?=$title ?></h1>
            <p class="benefits__description"><?=$description ?></p>
        </div>
        <div class="benefits__grid">
            <?php foreach ($benefits as $benefit): ?>
                <div class="benefits__benefit">
                    <img class="benefits__benefit-image" src="<?=$benefit['icon']['url'] ?>" />
                    <div>
                        <h2 class="benefits__benefit-title"><?=$benefit['title'] ?></h2>
                        <p class="benefits__benefit-copy"><?=$benefit['description'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="benefits__footer">
            <a href="<?=$button['url'] ?>" class="button button--black"><?=$button['title'] ?></a>
        </div>
    </div>
</div>