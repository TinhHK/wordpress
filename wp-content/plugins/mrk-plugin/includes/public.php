<?php
class MrkMP
{
    public function __construct()
    {
        add_filter('the_title', [$this, 'changeTitle']);

    }
    public function changeTitle()
    {
        return "Title was changed";
    }
}