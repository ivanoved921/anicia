<?php
session_start();
//require 'app/views/partials/headerAdmin.php';
require 'config.php';
require 'function.php';
$id = $_GET['id'];
//var_dump($id);die;
$db = new QueryBuilder;
$db->delete("apartments", $id);
redirect_to('myAd.php');
?>
