<?php
/*
Plugin Name: Mrktinh Plugin
Plugin URL: http://mrktinh.com
Description: Debug and explore plugin wordpress
Author: Mrktinh
Version: 1.0
Author URI: http://mrktinh.com
 */

// ========== action hook with priority ===============
add_action('wp_footer', 'mrk_new_data', 19);
add_action('wp_footer', 'mrk_new_one', 20);
add_action('wp_footer', 'mrk_new_data', 21);
function mrk_new_data()
{
    echo "<div>Hello Mrktinh</div>";
}
function mrk_new_one()
{
    echo "<div>Hello you again</div>";
}

