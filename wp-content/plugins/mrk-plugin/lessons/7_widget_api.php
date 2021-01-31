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
//        add_action('wp_head', [$this, 'addCss']);
        // global variables contain css and js
//        global $wp_styles;
//        global $wp_scripts;
        //wp_enqueue_script('myJs', MRK_PLUGIN_URL.'js/myJs.js', ['jquery'], '1.0', true);
        add_action('wp_enqueue_scripts', [$this, 'addCssUseReg']);
        add_action('wp_head', [$this, 'addJs']);
        add_action('wp_enqueue_scripts', [$this, 'addJSUseReg']);
    }

    public function addJs()
    {
        $outPut = '<script type="text/javascript" src="'.MRK_PLUGIN_URL.'/js/myJs.js'.'"></script>';
        echo $outPut;
    }

    public function addJSUseReg()
    {
        wp_register_script('myJs', MRK_PLUGIN_URL.'js/myJs.js', ['jquery'], '1.0', true);
        wp_enqueue_script('myJs');
    }

    public function addCssUseReg()
    {
//        wp_enqueue_style('simple-widget', MRK_PLUGIN_URL.'css/simple-widget.css', ['simple-widget-01', 'simple-widget-02'], '1.0', 'all');
        wp_register_style('simple-widget', MRK_PLUGIN_DIR.'css/simple-widget.css', [], '1.0', 'all');
        wp_register_style('simple-widget-01', MRK_PLUGIN_URL.'css/simple-widget-01.css', [], '1.0', 'all');
        wp_register_style('simple-widget-02', MRK_PLUGIN_URL.'css/simple-widget-02.css', [], '1.0', 'all');
//        wp_enqueue_style('simple-widget-01')
        if (is_front_page()) {
            wp_enqueue_style('simple-widget');
        } elseif (is_page()) {
            wp_enqueue_style('simple-widget-01');
        } else {
            wp_enqueue_style('simple-widget-02');
        }


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
        $css = ($instance['css']) ?? '';
        echo str_replace($this->widget_options['classname'], $this->widget_options['classname'].' '.$css, $before_widget);
        echo $before_title.$title.$after_title;
        echo '<ul>';
        echo '<li>'.$movie.'</li>';
        echo '</ul>';
        echo $after_widget;

    }
    // back-end
    public function form($instance)
    {$html = new MrkHtml();
        // title field
        $inputId = $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputVal = $instance['title'] ?? '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        echo '<p><label for="'.$inputId.'">'.translate('Title').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';
        // movie field
        $inputId = $this->get_field_id('movie');
        $inputName = $this->get_field_name('movie');
        $inputVal = $instance['movie'] ?? '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        echo '<p><label for="'.$inputId.'">'.translate('Movie').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';
        // css field
        $inputId = $this->get_field_id('css');
        $inputName = $this->get_field_name('css');
        $inputVal = $instance['css'] ?? '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        echo '<p><label for="'.$inputId.'">'.translate('css').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';

    }
    // update data back-end
    public function update($newInstance, $oldInstance)
    {
        $input['title'] = strip_tags($newInstance['title']);
        $input['movie'] = strip_tags($newInstance['movie']);
        $input['css'] = strip_tags($newInstance['css']);
        if(empty(array_filter($input))) {
            $input = $oldInstance;
        }
        return $input;

    }
}