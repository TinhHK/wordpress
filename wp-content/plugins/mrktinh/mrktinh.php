<?php
/*
Plugin Name: Mrktinh debug
Plugin URL: http://mrktinh.com
Description: Debug and explore plugin wordpress
Author: Mrktinh
Version: 1.0
Author URI: http://mrktinh.com
 */
function mrktinh_debug()
{
    global $wpdb;
    echo '<pre>';
    print_r($wpdb->queries);
}
add_action('wp_footer', 'mrktinh_debug');