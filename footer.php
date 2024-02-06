<footer class="footer section--grey section--curved">
    <div class="wrapper">
        <div class="footer__inner">
            <div class="footer__col">
                <p>Whilst we are building Beebu our Customer Services are available:</p>
                <ul>
                    <li>Monday - Friday</li>
                    <li>9:00am - 6:00pm</li>
                </ul>
                <a href="mailto:talktous@beebu.co.uk">talktous@beebu.co.uk</a>
                <p>Call 500 free from your Beebu or <a href="">0300 3036152</a></p>
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
        <div class="footer__bottom">
            <p>&copy;<?php echo date("Y"); ?> BeeBu. All rights reserved.</p>
            <p>Website designed and built by HewittMatthews</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>


</body>
</html>
