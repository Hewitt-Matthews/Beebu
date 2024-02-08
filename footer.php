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
                <a class="footer__email" href="mailto:talktous@beebu.co.uk">talktous@beebu.co.uk</a>
                <div class="footer__socials">

                    <a href="#" class="footer__social">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="" class="footer__social">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="" class="footer__social">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="" class="footer__social">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
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
            <p>Website designed and built by HewittMatthews</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>


</body>
</html>
