<?php
/*
Plugin Name: messages and Pages
Version: 2023
Author: Lovskiy
Author URI: Lovskiy.ru
Description: This plugin view count messages and pages
Tags: php
*/

add_action('admin_menu', 'messages_and_pages_add_menu');

function messages_and_pages_add_menu()
{
    add_options_page('Messages and Pages', 'Messages and Pages', 'manage_options', 'messages-and-pages', 'messages_and_pages_options_page');
}

function messages_and_pages_options_page()
{
    $pages_count = wp_count_posts('page');
    $messages_count = wp_count_posts('message');
    $total = $pages_count->publish + $messages_count->publish;
    ?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <p><?php echo __('Total number of pages and messages: ') . $total; ?></p>
    <p><?php echo __('Number of pages: ') . $pages_count->publish; ?></p>
    <p><?php echo __('Number of messages: ') . $messages_count->publish; ?></p>
</div>
<?php
}

?>