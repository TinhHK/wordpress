<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMpAdmin
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addMenu']);

    }
    // register setting and fields
    public function registerSettingAndFields()
    {
        register_setting('mrktinh_plugin_options', 'mrktinh_plugin_name', [$this, 'validateSetting']);
    }
    public function validateSetting()
    {

    }

    // add menu
    public function addMenu()
    {
        $slug = 'mrktinh-plugin-setting';
        add_menu_page(
            'Mrktinh setting title',
            'Mrktinh Plugin Setting',
            'manage_options',
            $slug,
            [$this, 'settingPage'],
            '',
            1
        );
    }
    // content of the menu
    public function settingPage()
    {
        require_once MRK_PLUGIN_DIR.'/views/setting-page.php';
    }

}