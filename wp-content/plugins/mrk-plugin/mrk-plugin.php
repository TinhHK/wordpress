<?php
/*
Plugin Name: Mrktinh Plugin
Plugin URL: http://mrktinh.com
Description: Debug and explore plugin wordpress
Author: Mrktinh
Version: 1.0
Author URI: http://mrktinh.com
 */

define('MRK_PLUGIN_URL', plugin_dir_url(__FILE__) );
define('MRK_PLUGIN_DIR', plugin_dir_path(__FILE__));

if(!is_admin()){
    require_once MRK_PLUGIN_DIR.'/includes/public.php';
    new MrkMP();
}