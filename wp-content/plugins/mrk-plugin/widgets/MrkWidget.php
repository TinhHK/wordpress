<?php
class MrkWidget extends WP_Widget
{
    public function __construct()
    {
        $idBase = 'mrk-widget';
        $name = 'Mrktinh Simple widget';
        $widgetOptions = [
            'classname' => 'mrk-class-css',
            'description' => 'This is a simple widget'
        ];
        $controlOptions = ['width' => '250px'];
        parent::__construct($idBase, $name, $widgetOptions, $controlOptions);
//        add_action('wp_head', [$this, 'changeCss']);
        add_action('wp_head', [$this, 'addCss']);
    }
    public function addCss()
    {
        $url = MRK_PLUGIN_URL.'css/simple-widget.css';
        $output = '<link rel="stylesheet" href="'.$url.'" type="text/css" media="all">';
        echo $output;
    }
    public function changeCss()
    {
        $output = "<style>
                        .mrk-class-css {
                            background-color: bisque;
                            border: 1px solid rosybrown;
                            padding: 10px;
                        } 
                    </style>";
        echo $output;
    }
    // show at front-end
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $title = (empty($title))? 'ABC simple' : $title;
        $movie = (empty($instance['movie']))? '$nbsp;' : $instance['movie'];
        echo $before_widget;
        echo $before_title.$title.$after_title;
        echo '<ul>';
        echo '<li>'.$movie.'</li>';
        echo '</ul>';
        echo $after_widget;

    }
    // back-end
    public function form($instance)
    {
        $html = new MrkHtml();
        // title field
        $inputId = $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputVal = $instance['title'];
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        echo '<p><label for="'.$inputId.'">'.translate('Title').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';
        // movie field
        $inputId = $this->get_field_id('movie');
        $inputName = $this->get_field_name('movie');
        $inputVal = $instance['movie'];
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        echo '<p><label for="'.$inputId.'">'.translate('Movie').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';

    }
    // update data back-end
    public function update($newInstance, $oldInstance)
    {
        $input['title'] = strip_tags($newInstance['title']);
        $input['movie'] = strip_tags($newInstance['movie']);
        if(empty(array_filter($input))) {
            $input = $oldInstance;
        }
        return $input;

    }
}