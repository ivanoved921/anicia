<?php
 require '../config.php';
 require '../function.php';
 session_start();
 
 if(!isset($_SESSION['login'])) {
     header('Location: ../index.php?requested_url='.urlencode($_SERVER['REQUEST_URI']));
  }
   $login = $_SESSION['login']; 
   $id = $_SESSION['id']; 
   
          
           $db = new QueryBuilder;
           $user = $db->getOne("users", $login); 
        
        //Если база данных вернула не пустой ответ - значит такой логин есть...
        if (!empty($user)) {
            //Получим соль:
            $salt = $user['salt'];
            //Посолим пароль из формы:
            $saltedPassword = md5($password.$salt);
         
            //Если соленый пароль из базы совпадает с соленым паролем из формы...
            if ($user['password'] == $saltedPassword) {
                //Стартуем сессию:
                session_start(); 


                //Пишем в сессию информацию о том, что мы авторизовались:
                $_SESSION['auth'] = true; 

                /*
                    Пишем в сессию логин и id пользователя
                    (их мы берем из переменной $user!):
                */
                $_SESSION['id'] = $user['id']; 
                $_SESSION['login'] = $user['login']; 
                 
            }
        } 
//   require '../app/views/partials/headerAdmin.php';
 ?>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Личный кабинет</title>
</head>
<div class="top-block container-fluid">
    <div class="container">
        <span class="top-block_right"><?php echo $_SESSION['login']; ?></span>
    </div>
</div>
<body>
<h1>Личный кабинет</h1>
<a href="../addata.php" class="btn">Добавить объявление</a><br>
<a href="../myAd.php">Мои объявления</a><br>
<a href="../index.php">На главную</a><br>
<a href="logout.php">Выход</a>
</body>