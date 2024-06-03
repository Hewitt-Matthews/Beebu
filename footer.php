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
            <p>
                <span>&copy;<?php echo date("Y"); ?> BeeBu. All rights reserved.</span>
                <br>
                <span>Beebu Telecom Limited is registered in England & Wales at: 1 Barnes Wallis Road, Fareham, Hampshire, UK PO15 5UA. Company no. 08043921. Please view our Privacy Policy for more information about how we protect and process the data you submit. Beebu Telecom Limited is authorised and regulated by the Financial Conduct Authority for certain types of consumer credit lending and credit related activities that are regulated under the Consumer Credit Act 1974 and by the Financial Services and Markets Act 2000. We are a broker not a lender (FCA Registered Number: ZA209021).</span>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>


</body>
</html>
