<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMpAdmin
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'mrkGetOption']);
    }

    public function mrkGetOption()
    {
        $mrktinh = get_option('mrk_plugin_array', ['name' => 'Hey Mr']);
        echo "<h1>{$mrktinh['name']}</h1>";
    }
    public function mrkAddVersion()
    {
        add_option('mrk_plugin_version', '1.0');
    }
    public function mrkAddSome()
    {
        add_option('mrk_plugin_some2', 'hey hey', '', 'No');
    }
    public function mrkAddArray()
    {
        $arr = [
            'name' => 'Mrktinh',
            'age'  => 31
        ];
        add_option('mrk_plugin_array', $arr, '', 'yes');
    }



}