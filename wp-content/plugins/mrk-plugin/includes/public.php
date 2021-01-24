<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMP
{
    public function __construct()
    {
        add_action('wp_footer', [$this, 'showFunction']);
    }

    public function showFunction()
    {
        MrkPLSupport::showFunc('widget_title');
    }

}