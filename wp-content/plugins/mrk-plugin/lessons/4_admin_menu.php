<?php
// add an submenu to existing menu
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

    // add a new menu
    public function settingNewMenu()
    {
        $menuSlug = 'mrk-menu';
        add_menu_page(
            'Mrk menu title',
            'Mrk menu',
            'manage_options',
            $menuSlug,
            [$this, 'settingPage'],
            MRK_PLUGIN_URL.'/images/icon.png'
        );
        // add submenu to a new menu
        add_submenu_page(
            $menuSlug,
            'About title',
            'About',
            'manage_options',
            $menuSlug.'-about',
            [$this, 'aboutPage']
        );
        add_submenu_page(
            $menuSlug,
            'Help title',
            'Help',
            'manage_options',
            $menuSlug.'-help',
            [$this, 'helpPage']
        );
    }

    public function aboutPage()
    {
        require_once MRK_PLUGIN_DIR.'/views/about-page.php';
    }
    public function helpPage()
    {
        require_once  MRK_PLUGIN_DIR.'/views/help-page.php';
    }

}
