<?php 

$title = get_sub_field('title');
// $reviews = [
//     [
//         'rating' => 5,
//         'title' => 'Review Title',
//         'copy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu feugiat pretium nibh ipsum consequat nisl vel. Non sodales neque sodales ut etiam sit amet.'
//     ],
//     [
//         'rating' => 5,
//         'title' => 'Review Title',
//         'copy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu feugiat pretium nibh ipsum consequat nisl vel. Non sodales neque sodales ut etiam sit amet.'
//     ],
//     [
//         'rating' => 5,
//         'title' => 'Review Title',
//         'copy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu feugiat pretium nibh ipsum consequat nisl vel. Non sodales neque sodales ut etiam sit amet.'
//     ],
//     [
//         'rating' => 5,
//         'title' => 'Review Title',
//         'copy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu feugiat pretium nibh ipsum consequat nisl vel. Non sodales neque sodales ut etiam sit amet.'
//     ],
//     [
//         'rating' => 5,
//         'title' => 'Review Title',
//         'copy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu feugiat pretium nibh ipsum consequat nisl vel. Non sodales neque sodales ut etiam sit amet.'
//     ],
//     [
//         'rating' => 5,
//         'title' => 'Review Title',
//         'copy' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eu feugiat pretium nibh ipsum consequat nisl vel. Non sodales neque sodales ut etiam sit amet.'
//     ],
// ];
$reviews = get_sub_field('reviews');
$rating = 5;
$button = get_sub_field('button');

?>

<div class="reviews section section--spaced section--green section--curved">
    <div class="wrapper">
        <div class="reviews__inner">
            <h2 class="reviews__title"><?=$title ?></h2>
            <div class="reviews__grid">
                <?php foreach ($reviews as $review): ?>
                    <div class="reviews__review">
                        <div class="reviews__score">
                            <?php for ($i=0; $i < $review['stars']; $i++): ?>
                                <span class="reviews__star"><img src="<?=get_template_directory_uri() ?>/assets/img/star.svg" /></span>
                            <?php endfor; ?>
                        </div>
                        <div class="reviews__review-content">
                            <h4 class="reviews__review-title"><?=$review['title'] ?></h4>
                            <p class="reviews__review-copy"><?=$review['copy'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="reviews__footer">
            <div class="reviews__trustpilot">
                <span>Excellent</span>
                <div class="reviews__score">
                    <?php for ($i=0; $i < $rating; $i++): ?>
                        <span class="reviews__star"><img src="<?=get_template_directory_uri() ?>/assets/img/star.svg" /></span>
                    <?php endfor; ?>
                </div>
                <img src="<?=get_template_directory_uri() ?>/assets/img/trustpilot.svg" />
            </div>
            <a href="<?=$button['url'] ?>" class="button button--black"><?=$button['title'] ?></a>
        </div>
    </div>
</div>