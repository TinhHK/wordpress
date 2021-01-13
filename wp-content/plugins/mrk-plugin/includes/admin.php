<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMpAdmin
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'settingMenu']);
    }
    // add submenu to Dashboard
    public function settingMenu()
    {
        $menuSlug = 'mrk-submenu';
        add_dashboard_page(
            'Mrk submenu title',
            'Mrk submenu',
            'manage_options',
            $menuSlug,
            [$this, 'settingPage']
        );
    }
    public function settingPage()
    {
        echo "<h2> Mrktinh setting </h2>";
    }
}