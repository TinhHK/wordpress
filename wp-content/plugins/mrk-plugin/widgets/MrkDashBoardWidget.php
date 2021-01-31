<?php

class MrkDashBoardWidget
{
    public function __construct()
    {
        add_action('wp_dashboard_setup', [$this, 'widget']);
    }

    public function widget()
    {
        wp_add_dashboard_widget('mrk_simple_db_widget', 'Mrktinh Plugin Information', [$this, 'display']);
    }

    public function display()
    {
        echo "Hello World Mrktinh was here";
    }
}