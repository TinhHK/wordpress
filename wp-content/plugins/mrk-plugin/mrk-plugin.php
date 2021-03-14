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
define('MRK_PLUGIN_INCLUDES', MRK_PLUGIN_DIR.'/includes');

if(is_admin()){
    require MRK_PLUGIN_DIR.'/includes/admin.php';
    require MRK_PLUGIN_INCLUDES.'/MrkHtml.php';
    require MRK_PLUGIN_DIR.'/widgets/MrkDashBoardWidget.php';
    new MrkMpAdmin();
    new MrkDashBoardWidget();
} else {
    require_once MRK_PLUGIN_DIR.'/includes/public.php';
    new MrkMP();
}
require MRK_PLUGIN_DIR.'/widgets/MrkWidget.php';
// register widget
add_action('widgets_init', 'mrkWidget');
function mrkWidget()
{
    register_widget('MrkWidget');
}
// unregister widget
//add_action('widgets_init', 'disableWidget');
function disableWidget()
{
    unregister_widget('MrkWidget');
}

// widget last post for transient
require_once MRK_PLUGIN_DIR.'/widgets/MrkWidgetLastPost.php';

function lastPostInit()
{
    register_widget('MrkWidgetLastPost');
}
add_action('widgets_init', 'lastPostInit');