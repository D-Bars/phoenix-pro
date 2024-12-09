<?php

add_action('customize_register', function (WP_Customize_Manager $wp_customize){
    
    //Section Header center
    $wp_customize->add_section('header__center__options', array(
        'title' => __('Шапка сайта', 'firm'),
        'priority' => 10
    ));

    //Header title
    $wp_customize->add_setting('header__title');
    $wp_customize->add_control('header__title', array(
        'label' => __('Заголовок шапки', 'firm'),
        'section' => 'header__center__options',
        'type' => 'textarea'
    ));

    //Header description
    $wp_customize->add_setting('header__description');
    $wp_customize->add_control('header__description', array(
        'label' => __('Описание/подзаголовок шапки', 'firm'),
        'section' => 'header__center__options',
        'type' => 'textarea'
    ));

    //Header custom image
    $wp_customize->add_setting('header__image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header__image', array(
        'label'    => __('Изображение шапки', 'firm'),
        'section'  => 'header__center__options',
    )));

    //Header mask
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
});

function phoenix__theme__options(){
    global $theme__options;
    $theme__options = array(
        //header options
        'header__title' => get_theme_mod('header__title'),
        'header__description' => get_theme_mod('header__description'),
        'header__image' => get_theme_mod('header__image'),
        'header__mask' => get_theme_mod('header__mask_enable')
    );
}
add_action('wp', 'phoenix__theme__options');
?>