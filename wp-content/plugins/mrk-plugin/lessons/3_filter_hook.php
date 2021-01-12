<?php
//======== add filter hook to change title with post having id = 1 =============
class MrkMP
{
    public function __construct()
    {
        // 2 is the number of argument in the_title hook
        add_filter('the_title', [$this, 'changeTitle'], 10, 2);

    }
    public function changeTitle($title, $id)
    {
        if($id == 1){
            return str_replace('Hello', 'Xin chao', $title);
        }
        return $title;
    }
}