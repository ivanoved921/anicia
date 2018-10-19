<?php
session_start();
require_once 'function.php';
require_once 'config.php';

if($_GET['flats']=='on') {
    $db = new QueryBuilder;
   $art = $db->allByProperty("apartments", 1);
//
    return $art;
    redirect_to('myAd.php');
}
