<?php

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('main-css',get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style( 'font-Montserrat', get_template_directory_uri() . '/assets/fonts', array(), false, true);

    wp_enqueue_script('main-js',   get_template_directory_uri() . '/assets/js/main.js',array(), false, true);
    wp_enqueue_script('jquery' );
});

add_action('after_setup_theme', function(){
    add_theme_support('custom-logo');
    load_theme_textdomain('firm', get_template_directory() . '/languages');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
});


function get__localize__title($objId) {
    $obj_title = get_the_title($objId);
    return printf(__('%s', 'firm'), $obj_title);
}
function get__localize__content($objId) {
    $obj_content = get_the_content($objId);
    return printf(__('%s', 'firm'), $obj_content);
}

function wp_dump( $data ) {
	echo "<pre>" . print_r( $data, 1 ) . "</pre>";
}

