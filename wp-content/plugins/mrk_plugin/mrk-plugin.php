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
if(is_admin()) {
    require_once dirname(__FILE__).'/includes/admin.php';
} else {
    require_once dirname(__FILE__).'/includes/public.php';
    echo admin_url('/css/about.css', __FILE__);
}
