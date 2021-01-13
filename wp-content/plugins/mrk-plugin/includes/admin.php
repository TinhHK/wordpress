<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMpAdmin
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'settingNewMenu']);
    }



}