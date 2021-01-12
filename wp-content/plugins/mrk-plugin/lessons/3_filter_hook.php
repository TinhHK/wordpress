<?php
//======== add filter hook to change title =============
add_filter('the_title', 'changeTitle');
function changeTitle()
{
    return 'This is changed title';
}