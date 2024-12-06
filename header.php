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
        <div id="header__line">
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
                <div class="header__menu__box" modal_wrapper>
                    <div class="header__lang__menu__box">
                        <ul class="header__menu__items__box">
                            <li class="header__menu__item"><a href="#"><?php _e('О фирме', 'firm'); ?></a></li>
                            <li class="header__menu__item"><a href="#"><?php _e('Контакты', 'firm'); ?></a></li>
                            <li class="header__menu__item"><a href="#"><?php _e('Контакты', 'firm'); ?></a></li>
                        </ul>
                        <div class="header__lang__box">
                            <div class="active__lang">RU</div>
                            <span>/</span>
                            <div class="lang">PL</div>
                        </div>
                    </div>
                    <div class="header__menu__closer" closer></div>
                    <div class="header__mask" mask></div>
                </div>
            </nav>
        </div>
    </header>