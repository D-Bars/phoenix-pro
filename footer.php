<footer>
    <?php
    global $theme__options;
    ?>
    <div class="footer__contact__block">
        <div class="footer__contact__item">
            <i class="fa-solid fa-phone footer__contact__ico"></i>
            <?php if ($theme__options['footer__phone']): ?>
                <div class="footer__contact__item__box">
                    <div class="footer__contact__title"><?php _e('Телефон', 'firm'); ?></div>
                    <a class="footer__contact__name"
                        href="tel:+<?php echo str_replace(array('+', '-', ' '), array('', '', ''), $theme__options['footer__phone']) ?>">
                        <?php echo $theme__options['footer__phone']; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="footer__contact__item">
            <i class="fa-regular fa-envelope footer__contact__ico"></i>
            <?php if ($theme__options['footer__mail']): ?>
                <div class="footer__contact__item__box">
                    <div class="footer__contact__title"><?php _e('Почта', 'firm'); ?></div>
                    <a class="footer__contact__name" href="mailto:<?php echo $theme__options['footer__mail']; ?>">
                        <?php echo $theme__options['footer__mail']; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="footer__contact__item">
            <i class="fa-solid fa-file footer__contact__ico"></i>
            <?php if ($theme__options['footer__nip']): ?>
                <div class="footer__contact__item__box">
                    <div class="footer__contact__title"><?php _e('НИП', 'firm'); ?></div>
                    <div class="footer__contact__name"><?php echo $theme__options['footer__nip']; ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer__design__el"></div>
    <div class="footer__logo__wrapper">
        <?php
        if ($theme__options['footer__logo']): ?>
            <a href="<?php echo home_url(); ?>">
            <?php echo '<img src="' . esc_url($theme__options['footer__logo']) . '" alt="FooterLogo">'
            ?>
            </a>
        <?php endif; ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>