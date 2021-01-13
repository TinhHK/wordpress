<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMpAdmin
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'settingNewMenuPosition']);
        add_action('admin_menu', [$this, 'removeMenu']);
    }

    public function removeMenu()
    {
        $menuSlug = 'mrk-menu';
        remove_submenu_page($menuSlug, $menuSlug.'-about');
    }

    public function settingNewMenuPosition()
    {
        $menuSlug = 'mrk-menu';
        add_menu_page(
            'Mrk menu title',
            'Mrk menu',
            'manage_options',
            $menuSlug,
            [$this, 'settingPage'],
            MRK_PLUGIN_URL.'/images/icon.png',
            1
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


}