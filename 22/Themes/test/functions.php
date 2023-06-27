<?php

//Добавляем параметры настройки темы
function custom_theme_setup()
{
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));
    add_theme_support('custom-header', array(
        'default-image' => '',
    ));
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('large-thumbnail', 1060, 600, true); //Добаление нового размера изображений
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'custom_theme_setup');

//Добавление раздела "Настройки темы" в административной панели WordPress
function custom_theme_customize_register($wp_customize)
{
    $wp_customize->add_section('custom_theme_options', array(
        'title'    => __('Настройки темы', 'custom-theme'),
        'priority' => 10,
    ));

    $wp_customize->add_setting('background_color', array(
        'default'   => '#ffffff',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label'    => __('Цвет фона', 'custom-theme'),
        'section'  => 'custom_theme_options',
        'settings' => 'background_color',
    )));

    $wp_customize->add_setting('copyright', array(
        'default'   => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('copyright', array(
        'label'    => __('Авторские права', 'custom-theme'),
        'section'  => 'custom_theme_options',
        'settings' => 'copyright',
    ));

    $wp_customize->add_setting('social_links', array(
        'default'   => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('social_links', array(
        'label'    => __('Ссылки на социальные сети', 'custom-theme'),
        'section'  => 'custom_theme_options',
        'settings' => 'social_links',
    ));
}
add_action('customize_register', 'custom_theme_customize_register');