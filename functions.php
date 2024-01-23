<?php
/*
 * My Theme Function
 */

// Theme Title
add_theme_support('title-tag');

// Theme CSS and jQuery file calling
function my_theme_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_stylesheet_uri() . './css/bootstrap.css', array(), '5.0.2', 'all');
    wp_enqueue_style('custom', get_stylesheet_uri() . './css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');

    // jQuery file calling
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_stylesheet_uri() . './js/bootstrap.js', array(), '5.0.2', true);
    wp_enqueue_script('custom', get_stylesheet_uri() . './js/custom.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Theme Menu

function register_my_menus($wp_customize)
{
    $wp_customize->add_section(
        'title_tagline',
        array(
            'title' => __('Header Area', 'himuroy'),
            'description' => 'Menu Options',
        )
    );
    $wp_customize->add_setting(
        'header_logo',
        array(
            'default' => get_bloginfo('template_directory') . '/img/logo.png',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'header_logo',
            array(
                'label' => 'Header Logo',
                'section' => 'title_tagline',
                'settings' => 'header_logo',
                'description' => 'Header Logo details',
                'priority' => 1
            )
        )
    );

    $wp_customize->add_setting(
        'footer_menu_id',
        array(
            'default' => 'Footer Menu',
            'transport' => 'refresh',
        )
    );
    $wp_customize->add_control(
        'footer_menu_id',
        array(
            'label' => 'Footer Menu',
            'section' => 'title_tagline',
            'type' => 'text',
        )
    );
}

add_action('customize_register', 'register_my_menus');