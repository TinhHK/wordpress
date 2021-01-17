<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMpAdmin
{
    private $_menuSlug = 'mrktinh-plugin-setting';
    private $_settingOptions;
    public function __construct()
    {
        $this->_settingOptions = get_option('mrktinh_plugin_name', []);
        add_action('admin_menu', [$this, 'addMenu']);
        add_action('admin_init', [$this, 'registerSettingAndFields']);

    }
    // register setting and fields
    public function registerSettingAndFields()
    {
        register_setting('mrktinh_plugin_options', 'mrktinh_plugin_name',
            [$this, 'validateSetting']);
        $mainSection = 'mrk_plg_main_section';

        // add section to view MAIN SETTING
        add_settings_section($mainSection, 'Main setting',
            [$this, 'main_section_view'], $this->_menuSlug);
        // add a field to section
        add_settings_field('mrk_plg_new_title', 'Site title',
            [$this, 'new_title_input'], $this->_menuSlug, $mainSection);
        add_settings_field('mrk_plg_logo', 'Logo',
                            [$this, 'logo_input'], $this->_menuSlug, $mainSection);
    }
    public function validateSetting($inputs)
    {
        if(isset($_FILES['mrk_plg_logo']['name'])){
            $override = ['test_form' => false];
            $fileInfo = wp_handle_upload($_FILES['mrk_plg_logo'], $override);
            $inputs['mrk_plg_log'] = $fileInfo['url'];
        }
        return $inputs;
    }
    public function main_section_view()
    {

    }
    public function new_title_input()
    {
        echo '<input type="text" name="mrktinh_plugin_name[mrk_plg_new_title]" 
            value="'.$this->_settingOptions['mrk_plg_new_title'].'"/>';
    }
    public function logo_input()
    {
        echo '<input type="file" name="mrk_plg_logo" />';
    }


    // add menu
    public function addMenu()
    {
        add_options_page(
            'Mrktinh setting title',
            'Mrktinh Plugin Setting',
            'manage_options',
            $this->_menuSlug,
            [$this, 'settingPage'],
        );
    }
    // content of the menu
    public function settingPage()
    {
        require_once MRK_PLUGIN_DIR.'/views/setting-page.php';
    }

}