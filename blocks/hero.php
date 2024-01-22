<div class="hero" style="background-image: url('<?=get_sub_field('background_image')['url']; ?>');">
    <div class="wrapper">
        <div class="hero__inner">
            <h1 class="hero__title"><?=get_sub_field('title'); ?></h1>
            <p class="hero__copy"><?=get_sub_field('copy'); ?></p>
            
            <form>
                <input type="text" placeholder="Enter Postcode" />
                <button type="submit">Check your area</button>
            </form>
        </div>
    </div>
</div>