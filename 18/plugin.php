<?php
/*
Plugin Name: change background po time
Version: 2023
Author: Lovskiy
Author URI: Lovskiy.ru
Description: change background po time
Tags: php
*/
function set_background_color()
{
    $current_time = date('H');
    if ($current_time >= 8 && $current_time <= 20) {
        ?>
<script>
document.body.style.backgroundColor = "#ccc";
</script>
<?php
    } else {
        ?>
<script>
document.body.style.backgroundColor = "#fff";
</script>
<?php
    }
}
add_action('wp_head', 'set_background_color');
?>