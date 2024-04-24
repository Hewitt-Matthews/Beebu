<?php 

$title = get_sub_field('title');
$button = get_sub_field('button');
$articles = get_sub_field('articles');
$section_options_background_colour = get_sub_field('section_options_background_colour');
$section_options_curved_section = get_sub_field('section_options_curved_section');
$section_padding = get_sub_field('section_padding');

?>

<div class="featured-articles section
  <?php echo 'section--' . $section_options_background_colour; ?>
  <?php if ( $section_padding ) : echo 'section--spaced'; endif; ?>
  <?php if ( $section_options_curved_section ) : echo 'section--curved'; endif; ?>
  ">
    <div class="wrapper">
        <div class="featured-articles__inner">
            <h2 class="featured-articles__title"><?=$title ?></h2>
            <a href="<?=$button['url'] ?>" class="button"><?=$button['title'] ?></a>
        </div>
        <div class="featured-articles__grid">
            <?php foreach ($articles as $article): ?>
                <a href="<?=get_permalink($article); ?>" class="article-card">
                    <div class="article-card__tag button button--small">Help & Advice</div>
                    <img src="<?=get_the_post_thumbnail_url($article, 'small'); ?>" alt="" class="article-card__image" />
                    <h2 class="article-card__title"><?=$article->post_title; ?></h2>
                    <p class="article-card__excerpt"><?= wp_trim_words( get_the_excerpt($article), 30, '[...]' ); ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>