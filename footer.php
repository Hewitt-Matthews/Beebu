<?php $rating = 5; ?>

<footer class="footer section--grey section--curved">
    <div class="wrapper">
        <div class="footer__inner">
            <div class="footer__col">
                <p>Our Customer Services are available:</p>
                <?php if(have_rows('footer_opening_hours', 'option')): ?>
                    <div class="footer__opening-hours">
                        <?php while(have_rows('footer_opening_hours', 'option')): the_row(); ?>
                            <p><?php echo get_sub_field('days'); ?><span><?php echo get_sub_field('times'); ?></span></p>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
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
                    <?php if(get_field('tiktok_url', 'option')): ?>
                        <a href="<?=get_field('tiktok_url', 'option') ?>" class="footer__social">
                            <i class="fa-brands fa-tiktok"></i>
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
            <!-- TrustBox script -->
            <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
                    <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b732fbfb950b10de65e5" data-businessunit-id="65957e521d1c310aa125e6d5" data-style-height="24px" data-style-width="100%" data-theme="dark">
                        <a href="https://uk.trustpilot.com/review/beebu.co.uk" target="_blank" rel="noopener">Trustpilot</a>
                    </div>
                </div>
        <div class="footer__bottom">
            <p>
                <span>&copy;<?php echo date("Y"); ?> BeeBu. All rights reserved.</span>
                <br>
                <span><?php the_field('footer_legal_disclaimer_text', 'option'); ?></span>
            </p>
        </div>
    </div>
</footer>

<button class="back-to-top" title="Back to Top"><i class="fas fa-angle-up"></i></button>

<?php wp_footer(); ?>


</body>
</html>
