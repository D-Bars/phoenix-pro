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
                <?php
                if (function_exists('the_custom_logo') && has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo home_url(); ?>">
                        <div class="logo__name"><?php bloginfo('name'); ?></div>
                    </a>
                    <?php
                }
                ?>
            </div>
            <nav class="header__menu__wrapper">
                <div class="burger__menu"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/burger.png"
                        alt="BurgerMenu"></div>
                <div class="header__menu__box" modal_wrapper>
                    <div class="header__lang__menu__box">
                        <ul class="header__menu__items__box">
                            <li class="header__menu__item"><a href="#about__us"><?php _e('О нас', 'firm'); ?></a></li>
                            <li class="header__menu__item"><a href="#"><?php _e('Контакты', 'firm'); ?></a></li>
                            <li class="header__menu__item"><a href="#"><?php _e('Контакты', 'firm'); ?></a></li>
                        </ul>
                        <div class="header__lang__box">
                            <?php echo do_shortcode('[language-switcher]'); ?>
                        </div>
                    </div>
                    <div class="header__menu__closer" closer></div>
                    <div class="header__mask" mask></div>
                </div>
            </nav>
        </div>
        <?php
        global $theme__options;
        ?>
        <div class="header__center">
            <div class="header__center__wrapper__img">
                <?php if($theme__options['header__mask']): echo '<div class="header__center__mask__img"></div>' ?>
                <?php endif; ?>
                <?php
                if ($theme__options['header__image']):
                    echo '<img src="' . esc_url($theme__options['header__image']) . '" alt="HeaderImg">'
                ?>
                <?php endif; ?>
            </div>
            <div class="header__center__content">
                <?php 
                if($theme__options['header__title']): 
                    echo '<h1 class="header__center__title">' . __('' . $theme__options['header__title'] . '', 'firm') . '</h1>'
                ?>
                <?php endif; ?>
                <?php 
                if($theme__options['header__description']): 
                    echo '<div class="header__center__description">' . __('' . $theme__options['header__description'] . '', 'firm') . '</div>'
                ?>
                <?php endif; ?>
                <div class="header__center__btn">
                    <i class="fa-regular fa-lightbulb"></i>
                    <span><?php _e('Связаться', 'firm'); ?></span>
                    <i class="fa-regular fa-lightbulb"></i>
                </div>
            </div>
        </div>
    </header>