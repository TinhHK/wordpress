<?php

class MrkWidgetLastPost extends WP_Widget
{
    public function __construct()
    {
        $idBase = "Mrk-widget-last-post";
        $name = "Mrktinh Latest post";
        $widgetOptions = [
            'classname' => 'mrk-css-last-post',
            'description' => 'Hiển thị bài viết mới nhất'
        ];
        $controlOptions = ['width' => '250px'];
        parent::__construct($idBase, $name, $widgetOptions, $controlOptions);
    }

    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $title = (empty($title)) ? 'Last Post' : $title;
        $format = (empty($format)) ? 'Standard' : $instance['format'];
        $items = (empty($items)) ? '5' : $instance['items'];
        $ordering = (empty($ordering)) ? 'DESC' : $instance['ordering'];

        $args = [
            'post_type' => 'post',
            'order' => $ordering,
            'orderby' => 'ID',
            'posts_per_page' => $items,
            'post_status' => 'public'
        ];
        $wpQuery = new WP_Query($args);
        if ($wpQuery->have_posts()) {
            echo '<ul>';
            while ($wpQuery->have_posts()) {
                $wpQuery->the_post();
                echo '<li>'.get_the_title(). '</li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }

    }

    public function update($newInstance, $oldInstance)
    {
        $instance = $oldInstance;
        $instance['title'] = $newInstance['title'];
        $instance['format'] = $newInstance['format'];
        $instance['items'] = $newInstance['items'];
        $instance['ordering'] = $newInstance['ordering'];
        return $instance;
    }

    public function form($instance)
    {
        $html = new MrkHtml();
        // title field
        $inputId = $this->get_field_id('title');
        $inputName = $this->get_field_name('title');
        $inputVal = $instance['title'] ?? '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        echo '<p><label for="'.$inputId.'">'.translate('Title').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';

        // format field
        $inputId = $this->get_field_id('format');
        $inputName = $this->get_field_name('format');
        $inputVal = $instance['format'] ?? '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        $options['data'] = ['Standard' => 'Standard'];
        $optionsTheme = (get_theme_support('post-formats'))[0];
        foreach($optionsTheme as $val) {
            $options['data'][$val] = $val;
        }


        echo '<p><label for="'.$inputId.'">'.translate('Type of format').'</label>'
        .$html->selectbox($inputName, $inputVal, $attr, $options)
        .'</p>';

        // Number of item
        $inputId = $this->get_field_id('items');
        $inputName = $this->get_field_name('items');
        $inputVal = $instance['items'] ?? '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        echo '<p><label for="'.$inputId.'">'.translate('Number of Item').'</label>'
            .$html->textbox($inputName, $inputVal, $attr)
            .'</p>';

        // Ordering
        $inputId = $this->get_field_id('ordering');
        $inputName = $this->get_field_name('ordering');
        $inputVal = $instance['ordering'] ?? '';
        $attr = ['id' => $inputId, 'class' => 'widefat'];
        $options['data'] = [
            'asc' => 'ACS',
            'desc' => 'DESC'
        ];


        echo '<p><label for="'.$inputId.'">'.translate('Ordering').'</label>'
            .$html->selectbox($inputName, $inputVal, $attr, $options)
            .'</p>';
    }
}