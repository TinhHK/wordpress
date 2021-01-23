<?php
class MrkWidget extends WP_Widget
{
    public function __construct()
    {
        $idBase = 'mrk-widget';
        $name = 'Mrktinh Simple widget';
        $widgetOptions = [
            'classname' => 'MrkWidget',
            'description' => 'This is a simple widget'
        ];
        $controlOptions = ['width' => '250px'];
        parent::__construct($idBase, $name, $widgetOptions, $controlOptions);
    }

    public function widget($args, $instance)
    {

    }

    public function form($instance)
    {
        $html = new MrkHtml();
        $inputId = $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputVal = '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        $html->textbox($inputName, $inputVal, $attr);
        echo '<p><label for="'.$inputId.'">'.translate('Title').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';
    }

    public function update($newInstance, $oldInstance)
    {

    }
}