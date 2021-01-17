<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMpAdmin
{
    private $_menuSlug = 'mrktinh-plugin-setting';
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addMenu']);
        add_action('admin_init', [$this, 'registerSettingAndFields']);

    }
    // register setting and fields
    public function registerSettingAndFields()
    {
        register_setting('mrktinh_plugin_options', 'mrktinh_plugin_name',
            [$this, 'validateSetting']);
        $mainSection = 'mrk_plg_main_section';
        $extendSection = 'mrk_plg_extend_section';
        // add section to view
        add_settings_section($mainSection, 'Main setting',
            [$this, 'main_section_view'], $this->_menuSlug);
        // add a field to section
        add_settings_field('mrk_plg_new_title', 'Site title',
            [$this, 'new_title_input'], $this->_menuSlug, $mainSection);
        add_settings_section($extendSection, 'Extend setting',
            [$this, 'main_section_view'], $this->_menuSlug);
    }
    public function validateSetting()
    {

    }
    public function main_section_view()
    {

    }
    public function new_title_input()
    {
        echo '<input type="text" name="mrktinh_plugin_name[mrk_plg_new_title]" value=""/>';
    }

    // add menu
    public function addMenu()
    {
        add_menu_page(
            'Mrktinh setting title',
            'Mrktinh Plugin Setting',
            'manage_options',
            $this->_menuSlug,
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