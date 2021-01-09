<?php
// ========== action hook with priority same not overridden===============
add_action('wp_footer', 'mrk_new_data', 19);
add_action('wp_footer', 'mrk_new_one', 20);
add_action('wp_footer', 'mrk_new_data', 21);
function mrk_new_data()
{
    echo "<div>Hello Mrktinh</div>";
}
function mrk_new_one()
{
    echo "<div>Hello you again</div>";
}

//======== add css to header if the page is the type of a page=========//
add_action('wp_head', 'mrk_add_css', 19);
function mrk_add_css()
{
    if(is_page()){
        $cssUrl = plugins_url('/css/my-style.css', __FILE__);
        $css = '<link rel="alternate" href="'.$cssUrl.'">';
        echo $css;
    }
}

//============= remove action after add action ===================
remove_action('wp_head', 'mrk_add_css', 19);

//============= remove all action in a hook ======================
remove_all_actions('wp_head');

//============ check action is existed or not, return priority =================
has_action('wp_head', 'mrk_add_css');