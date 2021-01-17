<?php
class MrkMpAdmin
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'mrkAddVersion']);
        add_action('admin_init', [$this, 'mrkAddSome']);
        add_action('admin_init', [$this, 'mrkAddArray']);
        add_action('admin_init', [$this, 'mrkGetOption']);
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
    // get option value by name
    public function mrkGetOption()
    {
        $mrktinh = get_option('mrk_plugin_array', ['name' => 'Hey Mr']);
        echo "<h1>{$mrktinh['name']}</h1>";
    }
    // udpate option autoload
    function updateAuto()
    {
        $op = get_option('mrk_plugin_some');
        update_option('mrk_plugin_some', $op, '', 'yes');
    }
    // update an value in array option
    function updateAge()
    {
        $arr = get_option('mrk_plugin_array', []);
        $arr['age'] = 32;
        update_option('mrk_plugin_array', $arr);
    }
    // delete an option name
    function deleteOp()
    {
        delete_option('mrk_plugin_some2');
    }



}