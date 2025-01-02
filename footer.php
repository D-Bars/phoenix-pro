<footer>
    <?php
    global $theme__options;
    ?>
    <div class="footer__contact__block">
        <div class="footer__contact__item">
            <i class="fa-solid fa-phone footer__contact__ico"></i>
            <?php if($theme__options['footer__phone']): ?>
                <a class="footer__contact__name" href="tel:+<?php echo str_replace(array('+', '-', ' '), array('', '', ''), $theme__options['footer__phone']) ?>">
                    <?php echo $theme__options['footer__phone']; ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="footer__contact__item">
            <i class="fa-regular fa-envelope footer__contact__ico"></i>
            <?php if($theme__options['footer__mail']): ?>
                <a class="footer__contact__name" href="mailto:<?php echo $theme__options['footer__mail']; ?>">
                    <?php echo $theme__options['footer__mail']; ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="footer__contact__item">
            <i class="fa-solid fa-file footer__contact__ico"></i>
            <?php if($theme__options['footer__nip']): ?>
                <div class="footer__contact__name"><?php echo $theme__options['footer__nip']; ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer__design__el"></div>
    <div class="footer__logo__wrapper">
        <?php
        if ($theme__options['footer__logo']):
        echo '<img src="' . esc_url($theme__options['footer__logo']) . '" alt="FooterLogo">'
        ?>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>