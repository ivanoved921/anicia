<?php
$pdo = new PDO("mysql:host=localhost; dbname=antest", "root", "");
$statement = $pdo->prepare("SELECT * FROM apartments WHERE id=:id");
$statement->bindParam(":id", $_GET['id']);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);

session_start();

?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>2-к квартира, 42 кв.м, 3/5 эт.</title>
  </head>
<body>
	<header class="header">
        <div class="top-block container-fluid">
            <div class="container">
                <span class="top-block_link_icon"></span>
                 <a class="top-block_link" href="admin/auth.php"><?php if($_SESSION['auth']) {echo $_SESSION['login'];} else {echo "Вход и регистрация";} ?></a>
            </div>
        </div>
        <div class="container">
            <div class="logo-block row">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/4.png" alt="Логотип">
                    </a>
                    <div class="logo-title">
                        <span class="name">Анисия</span>
                        <span>агентство недвижимости</span>
                    </div>
                </div>
                <div class="header-title"><h1>Купить квартиру в Елабуге</h1></div>
                <div class="phone-number">
                    <span>г. Елабуга</span>
                    <span>тел: 8-917-243-12-71</span>
                </div>
            </div>
        </div>
    </header>

<div class="item_view_page_layout container">
    <div class="item_view_header">
    	<div class="item_view_left col-8">
    		<div class="title_info-main">
    			<h2><?php if(($task['property']) == 1) { echo $task['num_of_rooms'].'-к квартира, '.$task['square'].' кв.м, '.$task['floor'].'/'.$task['floor_total'].' эт.';} elseif (($task['property']) == 3) {echo "Дом ". $task['square'].' кв.м на участке '.$task['land_area'].' соток';} elseif (($task['property']) == 2) {
                    echo "Комната, ".$task['square'].' кв.м, в'.$task['num_of_rooms'].'-к квартире';
                } ?></h2>
    		</div>
    		<div class="title_info_metadata">
    			<div class="title_info_metadata_item">
    				№ 1152873045, размещено сегодня в 14:10
    			</div>

    		</div>
    	</div>

    	<div class="item_view_right col-4">
    		<div class="item_price text-right">
    			<span class="item_price_value"><?php echo number_format($task['price'], 0, ',', ' '); ?> руб.</span>
    		</div>
    	</div>
    </div>

    <div class="item_view_content">
    	<div class="item_view_left col-8">
    		<div class="item_view_left_photo"><img src="images/<?= $task['img']; ?>" alt=""></div>
			<nav>
			  <a href="images/SAM_1778.JPG" class="current"><img src="images/2558539414.jpg" alt=""></a>
			  <a href="images/SAM_1777.JPG"><img src="images/3955936286.jpg" alt=""></a>
			</nav>
    	</div>
    </div>
    <div class="item_view_block">
        <div class="item_description">
            <p><?= $task['description'];?></p>
        </div>
    </div>

</div> <!-- end item_view_page_layout  -->         
	



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Галлерея  -->
	<script>
      $("nav").on("click", "a", function () {
      $(this).addClass("current").siblings().removeClass("current")
      $(".item_view_left_photo img").attr("src", $(this).prop("href"))
      return false;
   })	
    </script>
</body>
 
