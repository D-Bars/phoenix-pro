<?php

add_action('customize_register', function (WP_Customize_Manager $wp_customize){
    
    //Section Header center
    $wp_customize->add_section('header__center__options', array(
        'title' => __('Шапка сайта', 'firm'),
        'priority' => 10
    ));

    $wp_customize->add_setting('header__title');
    $wp_customize->add_control('header__title', array(
        'label' => __('Заголовок шапки', 'firm'),
        'section' => 'header__center__options',
        'type' => 'textarea'
    ));

    $wp_customize->add_setting('header__description');
    $wp_customize->add_control('header__description', array(
        'label' => __('Описание/подзаголовок шапки', 'firm'),
        'section' => 'header__center__options',
        'type' => 'textarea'
    ));

    $wp_customize->add_setting('header__image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header__image', array(
        'label'    => __('Изображение шапки', 'firm'),
        'section'  => 'header__center__options',
    )));

    $wp_customize->add_setting('header__mask_enable', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('header__mask_enable', array(
        'label' => __('Включить маску в шапке', 'firm'),
        'section' => 'header__center__options',
        'type' => 'checkbox',
        'description' => __('Отметьте, чтобы включить маску в шапке.', 'firm')
    ));


    //Section About us
    $wp_customize->add_section('about__us__options', array(
        'title' => __('Блок о нас', 'firm'),
        'priority' => 10
    ));

    $wp_customize->add_setting('about__us__text');
    $wp_customize->add_control('about__us__text', array(
        'label' => __('Текст о нас', 'firm'),
        'section' => 'about__us__options',
        'type' => 'textarea'
    ));

    $wp_customize->add_setting('about__us__image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about__us__image', array(
        'label'    => __('Изображение о нас', 'firm'),
        'section'  => 'about__us__options',
    )));

    //Section footer
    $wp_customize->add_section('footer__options', array(
        'title' => __('Footer', 'firm'),
        'priority' => 10
    ));

    $wp_customize->add_setting('footer__phone');
    $wp_customize->add_control('footer__phone', array(
        'label' => __('Footer номер телефона', 'firm'),
        'section' => 'footer__options',
    ));

    $wp_customize->add_setting('footer__mail');
    $wp_customize->add_control('footer__mail', array(
        'label' => __('Footer емейл', 'firm'),
        'section' => 'footer__options',
    ));

    $wp_customize->add_setting('footer__nip');
    $wp_customize->add_control('footer__nip', array(
        'label' => __('Footer НИП', 'firm'),
        'section' => 'footer__options',
    ));

    $wp_customize->add_setting('footer__logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer__logo', array(
        'label'    => __('Изображение в footer', 'firm'),
        'section'  => 'footer__options',
    )));
});

function phoenix__theme__options(){
    global $theme__options;
    $theme__options = array(

        'header__title' => get_theme_mod('header__title'),
        'header__description' => get_theme_mod('header__description'),
        'header__image' => get_theme_mod('header__image'),
        'header__mask' => get_theme_mod('header__mask_enable'),

        'about__us__text' => get_theme_mod('about__us__text'),
        'about__us__image' => get_theme_mod('about__us__image'),

        'footer__phone' => get_theme_mod('footer__phone'),
        'footer__mail' => get_theme_mod('footer__mail'),
        'footer__nip' => get_theme_mod('footer__nip'),
        'footer__logo' => get_theme_mod('footer__logo')
    );
}
add_action('wp', 'phoenix__theme__options');
?>