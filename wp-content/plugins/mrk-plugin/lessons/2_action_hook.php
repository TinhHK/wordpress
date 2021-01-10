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

//=========== create an new action hook ===============
add_action('mrk_hook', 'mrk_action_callback');
function mrk_action_callback()
{
    echo "<div> Create the hook successfully </div>";
}
function mrk_new_hook()
{
    do_action('mrk_hook');
}

//========= create a new hook with argument ==============
add_action('mrk_footer_hook', 'show_info', 10, 3);
function show_info($name, $age, $sex)
{
    echo "Mr/Ms $name is $age years old and $sex";
}
function mrk_show_info()
{
    do_action('mrk_footer_hook', 'Mrktinh', 31, 'male');
}

//============ use class for action =================
class MrkPlugin
{
    public function newFooter()
    {
        echo "<div>Use class for action </div>";
    }
    public function newFooter2()
    {
        echo "<div>Use class for action 2</div>";
    }
}

$mrk= new MrkPlugin();
add_action('wp_footer', [$mrk, 'newFooter']);
add_action('wp_footer', [$mrk, 'newFooter2']);

class MrkPlugin2
{
    public function __construct(){
        add_action('wp_footer', [$this, 'newFooter']);
    }
    public function newFooter()
    {
        echo "<div>Use class for action </div>";
    }
    public function newFooter2()
    {
        echo "<div>Use class for action 2</div>";
    }
}
new MrkPlugin2();

class MrkPlugin3
{
    public static function init()
    {
        add_action('wp_footer', [__CLASS__, 'newFooter']);
    }
    public static function newFooter()
    {
        echo "<div>This is called by static </div>";
    }
}
MrkPlugin3::init();