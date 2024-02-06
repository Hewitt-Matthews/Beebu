<?php 

$title = get_sub_field('title');
$button = get_sub_field('button');
$articles = get_sub_field('articles');

?>

<div class="featured-articles section section--spaced section--curved">
    <div class="wrapper">
        <div class="featured-articles__inner">
            <h2 class="featured-articles__title"><?=$title ?></h2>
            <a href="<?=$button['url'] ?>" class="button"><?=$button['title'] ?></a>
        </div>
        <div class="featured-articles__grid">
            <?php foreach ($articles as $article): ?>
                <div class="article-card">
                    <img src="<?=get_the_post_thumbnail_url($article, 'small'); ?>" alt="" class="article-card__image" />
                    <h2 class="article-card__title"><?=$article->post_title; ?></h2>
                    <p class="article-card__excerpt"><?=get_the_excerpt($article); ?></p>
                    <a href="<?=get_permalink($article); ?>" class="article-card__button button">Help & Advice</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>