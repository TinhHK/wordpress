<?php
// get 1 record
global $wpdb;
$table = $wpdb->prefix.'mrk_article';
$query = "select * from {$table} where status = 1";
$result = $wpdb->get_row($query, ARRAY_A, 2);
echo "<pre>";
var_export($result);
echo "</pre>";die;