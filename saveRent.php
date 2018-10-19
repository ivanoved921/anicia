<?php
    require 'function.php';
    session_start();
    $_SESSION["address"] = $_POST['address'];
    $_SESSION["number-rooms"] = $_POST['number-rooms'];
    $_SESSION["floor"] = $_POST['floor'];
    $_SESSION["floors_in-house"] = $_POST['floors_in-house'];
    $_SESSION["type-of-house"] = $_POST['type-of-house'];
    $_SESSION["area"] = $_POST['area'];
    $_SESSION["title"] = $_POST['title'];
    $_SESSION["price"] = $_POST['price'];

    if(isset($_POST)) {
         $img = htmlspecialchars($_POST['image']);
         $address = htmlspecialchars($_POST['address']);
         $numberRooms = htmlspecialchars($_POST['number-rooms']);
         $floor = htmlspecialchars($_POST['floor']);
         $floorsInHouse = htmlspecialchars($_POST['floors_in-house']);
         $typeOfHouse = htmlspecialchars($_POST['type-of-house']);
         $area = htmlspecialchars($_POST['area']);
         $title = htmlspecialchars($_POST['title']);
         $price = htmlspecialchars($_POST['price']);

    }

    include "config.php";
      header("Location: ".$_SERVER["HTTP_REFERER"]);
    exit;
    /**
     * Добавляем данные в базу
     */
//     $query = "INSERT INTO apartmentsForRent (img, address, numberRooms, floor, floorsInHouse, typeOfHouse, area, title, price) VALUES ('$img', '$addres', '$numberRooms', '$floor', '$floorsInHouse', '$typeOfHouse', '$area', '$title', '$prise')";
//     $result = mysqli_query($connectDB, $query);
//     if ($result == true) {
//         echo "Данные успешно сохранены!";
//     } else {
//     echo "Произошла ошибка, пожалуйста повторите попытку.";
// }
?>