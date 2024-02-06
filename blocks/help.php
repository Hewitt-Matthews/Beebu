<?php 

$title = get_sub_field('title');
$faqs = get_sub_field('faq');
$description = get_sub_field('description');
$button = get_sub_field('button');

?>

<div class="help section section--spaced section--green">
    <div class="wrapper">
        <div class="help__inner">
            <div class="help__content">
                <h2 class="help__title"><?=$title ?></h2>
                <p class="help__description"><?=$description ?></p>
                <a href="<?=$button['url'] ?>" class="button button--black"><?=$button['title'] ?></a>
            </div>
            <div class="help__questions">
                <?php foreach ($faqs as $faq): ?>
                    <div class="help__question">
                        <div class="help__question-inner">
                            <h5><?=$faq['question'] ?></h5>
                            <button class="help__expand js-question-toggle"></button>
                        </div>
                        <p class="help__answer"><?=$faq['answer'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>