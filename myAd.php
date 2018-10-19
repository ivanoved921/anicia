<?php
require 'config.php';
require 'function.php';
session_start();

if($_SESSION['auth'] == true){selectAllByLogin(); ?>
<!DOCTYPE html>
 <html lang="ru">
 <head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
 	<title>Личный кабинет</title>
 </head>
 <div class="top-block container-fluid">
     <div class="container">
         <div class="row">
             <a class="top-block_link" href="addata.php">Добавить объявление</a>
            <span class="top-block_right text-right"><?php echo $_SESSION['login']; ?></span>
         </div>
     </div>
</div>
 <ul class="breadcrumbs">
     <li><a href="index.php">ГЛАВНАЯ </a></li>
     <li><a href="admin/index.php">ЛИЧНЫЙ КАБИНЕТ </a></li>
     <li class="current">МОИ ОБЪЯВЛЕНИЯ</li>
 </ul>

<body>
<div class="col-12 col-md-6 offset-md-3">
    <h2 class="text-center">Мои объявления: <?php echo($_SESSION['count']); unset($_SESSION['count']); ?></h2>
</div>
<div id="myAdFilter" class = "container">
    <form id="myAdFilter_form" class="row" action="myAd.php" method="get">
        <label class="col-3"><h6>Квартиры</h6>
            <input type="checkbox" name="flats" id="flats" onchange="$('#myAdFilter_form').submit();">
        </label class="col-3">
        <label class="col-3"><h6>Комнаты</h6>
            <input type="checkbox" name="rooms" id="rooms" onchange="$('#myAdFilter_form').submit();">
        </label>
        <label class="col-3"><h6>Дома</h6>
            <input type="checkbox" name="houses" id="houses" onchange="$('#myAdFilter_form').submit();">
        </label>
        <label class="col-3"><h6>Земельные участки</h6>
            <input type="checkbox" name="land" id="land" onchange="$('#myAdFilter_form').submit();">
        </label>
    </form>
</div>
<?php
unset($_SESSION['count']);
if($_GET['flats']=='on') {
    require 'myAdShowFlats.php';
} elseif($_GET['rooms']=='on') {
    require 'myAdShowRooms.php';
} elseif($_GET['houses'] == 'on') {
    require 'myAdShowHouses.php';
} elseif($_GET['land'] == 'on') {
    require 'myAdShowLand.php';
}
else {
require 'myAdShowAll.php';}
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
<?php
} else redirect_to('index.php');
 ?>
