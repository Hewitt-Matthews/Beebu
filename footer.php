<?php $rating = 5; ?>

<footer class="footer section--grey section--curved">
    <div class="wrapper">
        <div class="footer__inner">
            <div class="footer__col">
                <p>Our Customer Services are available:</p>
                <ul>
                    <li>Monday - Friday</li>
                    <li>9:00am - 5:00pm</li>
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
                <span>Beebu Telecom Limited is registered in England & Wales at: 1 Barnes Wallis Road, Fareham, Hampshire, UK PO15 5UA. Company no. 08635537. Please view our Privacy Policy for more information about how we protect and process the data you submit. Beebu Telecom Limited is authorised and regulated by the Financial Conduct Authority for certain types of consumer credit lending and credit related activities that are regulated under the Consumer Credit Act 1974 and by the Financial Services and Markets Act 2000. We are a broker not a lender (FCA Registered Number: 763300).</span>
            </p>
        </div>
    </div>
</footer>

<button class="back-to-top" title="Back to Top"><i class="fas fa-angle-up"></i></button>

<?php wp_footer(); ?>


</body>
</html>
