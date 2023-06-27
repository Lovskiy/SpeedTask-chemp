<?php
/*
    Plugin Name: Change Background Plugin
    Plugin URI: wsr.ru
    Version: 2023
    Author: Lovskiy
    Author URI: Lovskiy.ru
    Description: This plugin changed background in post
    Tags: php
*/

function add_background_to_post()
{
    // Получение ID поста, на который пользователь переходит
    $post_id = get_the_ID();
    // Получение значения для настройки фона из метаполей
    $bg_image = get_post_meta($post_id, 'bg_image', true);
    if(!empty($bg_image)) {
        // Добавление стиля для заднего фона
        echo '<style> body.single-post { background-image:url("' . esc_url($bg_image) . '"); background-size: cover; } </style>';
    }
}

add_action('wp_head', 'add_background_to_post');