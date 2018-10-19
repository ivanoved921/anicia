<?php
session_start();
require 'app/views/partials/headerAdmin.php';
require 'config.php';
require_once 'function.php';

$id = $_GET['id'];
$db = new QueryBuilder();
$task = $db->getOneId("apartments", $id);
?>
<?php
$property = $task['property'];
if ($property == 1) {
//Подключаем форму редактирования квартир
require 'app/views/formsEdit/flats.php';
} elseif($property == 2) {
//Подключаем форму редактирования домов
require 'app/views/formsEdit/rooms.php';
} elseif ($property == 3) {
//Подключаем форму редактирования комнат
require 'app/views/formsEdit/houses.php';
} elseif ($property == 4) {
//Подключаем фрму редактирования земельных участков
require 'app/views/formsEdit/land.php';
}


