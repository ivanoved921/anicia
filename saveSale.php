<?php
require 'function.php';
session_start();
require 'handler.php';

    //Если форма была отправлена и она не пустая:
    if (isset($_POST)) {
        $address = htmlspecialchars($_POST['address']);
        $num_of_rooms = htmlspecialchars($_POST['num_of_rooms']);
        $obj_type_id = htmlspecialchars($_POST['obj_type_id']);
        $floor = htmlspecialchars($_POST['floor']);
        $floor_total = htmlspecialchars($_POST['floor_total']);
        $square = htmlspecialchars($_POST['square']);
        $land_area = htmlspecialchars($_POST['land_area']);
        $description = htmlspecialchars($_POST['description']);
        $price = htmlspecialchars($_POST['price']);
        $img = ($_FILES['img']['name']);
        $property = $_POST['property'];
        $author = ($_SESSION['login']);
        $uploadDate = date("Y-m-d H:i:s");

        if($property == 1) {
            $data = ['property'=>$property, 'address'=>$address, 'num_of_rooms'=>$num_of_rooms, 'obj_type_id'=>$obj_type_id,
                'floor'=>$floor, 'floor_total'=>$floor_total, 'square'=>$square, 'description'=>$description,
                'price'=>$price, 'img'=>ltrim($imageFullName, 'images/'), 'author'=>$author,
                'uploadDate'=>$uploadDate];
        } elseif($property == 2) {
            $data = ['property'=>$property, 'address'=>$address, 'num_of_rooms'=>$num_of_rooms, 'obj_type_id'=>$obj_type_id,
                'floor'=>$floor, 'floor_total'=>$floor_total, 'square'=>$square, 'description'=>$description, 'price'=>$price,
                'img'=>ltrim($imageFullName, 'images/'), 'author'=>$author,
                'uploadDate'=>$uploadDate];
        } elseif($property == 3) {
            $data = ['property'=>$property, 'address'=>$address, 'num_of_rooms'=>$num_of_rooms, 'obj_type_id'=>$obj_type_id,
                'floor'=>$floor, 'floor_total'=>$floor_total, 'square'=>$square, 'land_area'=>$land_area,
                'description'=>$description, 'price'=>$price, 'img'=>ltrim($imageFullName, 'images/'),
                'author'=>$author, 'uploadDate'=>$uploadDate];
        } elseif($property == 4) {
            $data = ['property'=>$property, 'address'=>$address, 'land_area'=>$land_area,
                'description'=>$description, 'price'=>$price, 'img'=>ltrim($imageFullName, 'images/'),
                'author'=>$author, 'uploadDate'=>$uploadDate];
        }

//        var_dump($_POST, $data);die;
    }  else echo "Что то пошло не так...";

    require "config.php";
    /* проверяем, все ли поля заполнены*/
    if($property == 4) {

        $db = new QueryBuilder;
        $db->store("apartments", $data);

        header('location: success.php', true, 303);
    }elseif(empty($address) || empty($num_of_rooms)  || empty($obj_type_id) || empty($floor_total) || empty($description) || empty($price)) {
        
    echo ('Вы заполнили не все поля!');
 } else {
 	/* добавляем запись в таблицу */
 	$db = new QueryBuilder;
    $db->store("apartments", $data);


      {
  	header('location: success.php', true, 303);

  }
  echo "Произошла ошибка, пожалуйста повторите попытку.";

}
?>