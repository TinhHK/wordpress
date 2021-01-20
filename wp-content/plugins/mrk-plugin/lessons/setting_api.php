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
            [$this, 'makeForm'], $this->_menuSlug, $mainSection, ['name' => 'new_title']);
        add_settings_field('mrk_plg_logo', 'Logo',
            [$this, 'makeForm'], $this->_menuSlug, $mainSection, ['name' => 'new_logo']);
    }

    public function makeForm($args)
    {
        if($args['name'] == 'new_title'){
            echo '<input type="text" name="mrktinh_plugin_name[mrk_plg_new_title]" 
            value="'.$this->_settingOptions['mrk_plg_new_title'].'"/>';
        }
        if($args['name'] == 'new_logo'){
            echo '<input type="file" name="mrk_plg_logo">';
            if(!empty($this->_settingOptions['mrk_plg_logo'])){
                echo '<div style="display:block;margin-top:20px"><img src="'.$this->_settingOptions['mrk_plg_logo'].'" width="200" /></div>';
            }
        }

    }
    public function validateSetting($inputs)
    {
        $errors = [];
        // validate length
        if(!empty($inputs['mrk_plg_new_title']) && !$this->maxLength($inputs['mrk_plg_new_title'], 20)){
            $errors['mrk_plg_new_title'] = 'maximum is 20 character';
        }
        if(!empty($_FILES['mrk_plg_logo']['name'])){
            if(!$this->fileType($_FILES['mrk_plg_logo']['name'], 'JPG|PNG|GIF')){
                $errors['mrk_plg_logo'] = 'Image type is not allowed';
            }else {
                $override = ['test_form' => false];
                $fileInfo = wp_handle_upload($_FILES['mrk_plg_logo'], $override);
                $inputs['mrk_plg_logo'] = $fileInfo['url'];
                // save path of image
                $inputs['mrk_plg_logo_path'] = $fileInfo['file'];
                // delete old image
                if(!empty($this->_settingOptions['mrk_plg_logo_path'])){
                    // don't show error
                    @unlink($this->_settingOptions['mrk_plg_logo_path']);
                }
            }
        }else {
            // not upload a new image, keep old image in database
            $inputs['mrk_plg_logo'] = $this->_settingOptions['mrk_plg_logo'];
            $inputs['mrk_plg_logo_path'] = $this->_settingOptions['mrk_plg_logo_path'];
        }
        if(count($errors) > 0){
            $strError = '';
            foreach($errors as  $error) {
                $strError .= $error.'<br>';
            }
            add_settings_error($this->_menuSlug,'my-setting', $strError, 'error');
        }else {
            add_settings_error($this->_menuSlug,'my-setting', 'Successfully!', 'success');
        }
        return $inputs;
    }
    // validate length
    private function maxLength($str, $length)
    {
        $flag = false;
        $str = trim($str);
        if(strlen($str) <= $length ){
            $flag = true;
        }
        return $flag;
    }
    // validate type
    private function fileType($fileType, $pattern)
    {
        $flag = false;
        $pattern = '/^.*\.('.strtolower($pattern).')$/i';
        if(preg_match($pattern, strtolower($fileType))) {
            $flag = true;
        }
        return $flag;
    }
    public function main_section_view()
    {

    }

    // add menu
    public function addMenu()
    {
        add_menu_page(
            'Mrktinh setting title',
            'Mrktinh Plugin Setting',
            'manage_options',
            $this->_menuSlug,
            [$this, 'settingPage']
        );
    }
    // content of the menu
    public function settingPage()
    {
        require_once MRK_PLUGIN_DIR.'/views/setting-page.php';
    }

}