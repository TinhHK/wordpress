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
        $posts = new WP_Query(['author' => 1]);
        if ($posts->have_posts()) {
            echo '<ul>';
            while ($posts->have_posts()) {
                $link = '#';
                $posts->the_post();
                $link = admin_url("?post=".get_the_ID()."&action=edit");
                echo '<li><a href="'.$link.'">'. get_the_title(). '</a></li>';
            }
            echo '</ul>';
        } else {
            echo '<p>'.translate('No posts found'). '</p>';
        }
        wp_reset_postdata();
    }
}