<?php

global $wpdb;
$table = $wpdb->prefix.'mrk_article';
$query = "select * from {$table} where status = 1";
// get one record
$result = $wpdb->get_row($query, ARRAY_A, 2);

// get one colum of all rows
$result = $wpdb->get_col($query, 1);

// get all rows, return array of objects or associated array or numeric array
$result = $wpdb->get_results($query);

// insert one record, return 1 if insert successfully
$format = ['%s', '%s'];
$wpdb->insert($table, ['title' => 'Mrkinh won a prize', 'picture' => 'abc.jpg'], $format);

// replace data, create new if not existing, edit if existed. Use $id to clarify
$format = ['%d', '%s', '%s'];
$wpdb->replace($table, ['id' => 18, 'title' => 'Mrkinh won a prize', 'picture' => 'abc.jpg'], $format);

// udapte data
$format = ['%s', '%s'];
$where = ['id' => 20];
$whereFormat = ['%d'];
$wpdb->replace($table, ['title' => 'Mrkinh won a prize', 'picture' => 'abc.jpg'], $where, $format, $whereFormat);

echo "<pre>";
var_export($result);
echo "</pre>";die;