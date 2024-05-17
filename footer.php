<?php $rating = 5; ?>

<footer class="footer section--grey section--curved">
    <div class="wrapper">
        <div class="footer__inner">
            <div class="footer__col">
                <p>Whilst we are building Beebu our Customer Services are available:</p>
                <ul>
                    <li>Monday - Friday</li>
                    <li>9:00am - 6:00pm</li>
                </ul>
                <?php if(get_field('email_address', 'option')): ?>
                    <a class="footer__email" href="mailto:<?=get_field('email_address', 'option') ?>"><?=get_field('email_address', 'option') ?></a>
                <?php endif; ?>
                <div class="footer__socials">
                    <?php if(get_field('linkedin_url', 'option')): ?>
                        <a href="<?=get_field('linkedin_url', 'option') ?>" class="footer__social">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_field('instagram_url', 'option')): ?>
                        <a href="<?=get_field('instagram_url', 'option') ?>" class="footer__social">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_field('x_url', 'option')): ?>
                        <a href="<?=get_field('x_url', 'option') ?>" class="footer__social">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(get_field('facebook_url', 'option')): ?>
                        <a href="<?=get_field('facebook_url', 'option') ?>" class="footer__social">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer__col">
                <?php wp_nav_menu( array('theme_location' => 'footer-left') ); ?>
            </div>
            <div class="footer__col">
                <?php wp_nav_menu( array('theme_location' => 'footer-centre') ); ?>
            </div>
            <div class="footer__col">
                <?php wp_nav_menu( array('theme_location' => 'footer-right') ); ?>
            </div>
        </div>
        <div class="footer__trustpilot">
            <span>Excellent</span>
            <div class="reviews__score">
                <?php for ($i=0; $i < $rating; $i++): ?>
                    <span class="reviews__star"><img src="<?=get_template_directory_uri() ?>/assets/img/star.svg" /></span>
                <?php endfor; ?>
            </div>
            <img src="<?=get_template_directory_uri() ?>/assets/img/trustpilot-white.svg" />
        </div>
        <div class="footer__bottom">
            <p>&copy;<?php echo date("Y"); ?> BeeBu. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>


</body>
</html>
