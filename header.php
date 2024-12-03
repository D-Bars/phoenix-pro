<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="header__line">
            <div class="header__logo__wrapper">
                <a href="<?php echo home_url(); ?>">
                    <?php
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <div class="logo__name"><?php bloginfo('name'); ?></div>
                        <?php
                    }
                    ?>
                </a>
            </div>
            <nav class="header__menu__wrapper">
                <div class="burger__menu"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/burger.png"
                        alt="BurgerMenu"></div>
                <ul class="header__menu__box">
                    <li class="header__menu__item"><a href="#"><?php _e('О фирме', 'firm'); ?></a></li>
                    <li class="header__menu__item"><a href="#"><?php _e('Контакти', 'firm'); ?></a></li>
                </ul>
            </nav>
        </div>
    </header>