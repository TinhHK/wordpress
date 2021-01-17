<?php
class MrkMpAdmin
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'mrkAddVersion']);
        add_action('admin_init', [$this, 'mrkAddSome']);
        add_action('admin_init', [$this, 'mrkAddArray']);
    }

    public function mrkAddVersion()
    {
        add_option('mrk_plugin_version', '1.0');
    }
    public function mrkAddSome()
    {
        // autoload will be yes :))
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