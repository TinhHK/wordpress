<?php

// ========== dump query on footer =============
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

//============= create table and option when activating plugin =================
register_activation_hook(__FILE__, 'mrk_active');
register_activation_hook(__FILE__, 'mrk_active_db');

function mrk_active_db() {
    global $wpdb;
    $table_name = $wpdb->prefix.'mrk_mp_test';
    if($wpdb->get_var("show tables like '".$table_name."'") != $table_name) {
        $sql = "create table `".$table_name."` (
                `myid` tinyint(4) unsigned not null auto_increment,
                `my_name` varchar(50) default null,
                primary key (`myid`)
                ) engine=innodb default charset=utf8 auto_increment=1;";
        require_once ABSPATH.'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
}

function mrk_active() {
    $mrk_plugin_option = array(
        'course'  => 'Wordpress foundation',
        'author'  => 'Mrktinh',
        'website' => 'mrktinh.com'
    );
    // option api
    // if option name is existing, nothing is recorded
    add_option("mrk_plugin_option", $mrk_plugin_option, '', 'yes');
}

//===================== Deactive plugin ======================
register_deactivation_hook(__FILE, 'mrk_plg_deactive');
function mrk_plg_deactive()
{
    global $wpdb;
    $table_name = $wpdb->prefix.'options';
    $wpdb->update(
        $table_name,
        ['autoload' => 'no'],
        ['option_name' => 'mrk_plugin_option'],
        ['%s'],
        ['%s']
    );
}
