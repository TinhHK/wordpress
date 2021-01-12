<?php
require_once MRK_PLUGIN_DIR.'/includes/support.php';
class MrkMP
{
    public function __construct()
    {
        // 2 is the number of argument in the_title hook
        add_filter('the_title', [$this, 'changeTitle'], 10, 2);
        add_action('wp_footer', [$this, 'showFunction']);
        add_filter('the_content', [$this, 'changeContent']);
        // remove filter hook convert_smilles
        remove_filter('the_content', 'convert_smilies');
        // remove all filter of the content hook with priority is 10, other priorities are not removed
        remove_all_filters('the_content', 10);

    }
    //======== add filter hook to change title with post having id = 1 =============
    public function changeTitle($title, $id)
    {
        if($id == 1){
            return str_replace('Hello', 'Xin chao', $title);
        }
        return $title;
    }
    // show all filter hook is running
    public function showFunction()
    {
        MrkPLSupport::showFunc();
    }
    // change content if post is the page, not post type
    public function changeContent($content)
    {
        global $post;
        if($post->post_type == 'page') {
            $content = str_replace('WordPress', "<a>WP</a>", $content);
            return "Mrktinh content was here".$content;
        }
        return $content;
    }
}