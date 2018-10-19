<?php
require 'config.php';
 require 'function.php';
 
 session_start();
 if(!isset($_SESSION['login'])) {
     header('Location: index.php?requested_url='.urlencode($_SERVER[REQUEST_URI]));
  }
    $login = $_SESSION['login']; 
    $id = $_SESSION['id'];
    $password = $_SESSION['password']; 
          /*
            Формируем и отсылаем SQL запрос:
            ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login
        */
        // $query = 'SELECT*FROM users WHERE login="'.$login.'"';
        // $result = mysqli_query($conDB,$query); //ответ базы запишем в переменную $result
           $db = new QueryBuilder;
           $user = $db->getOne("users", $login); 
        //Преобразуем ответ из БД в нормальный массив PHP:
         

        //Если база данных вернула не пустой ответ - значит такой логин есть...
        if (!empty($user)) {
        
            //Если соленый пароль из базы совпадает с соленым паролем из формы...
            if ($user['password'] == $password) {
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
                // redirect_to('index.php'); 
            }
            //Если соленый пароль из базы НЕ совпадает с соленым паролем из формы...
            else {
               // header('location: index.php');
                echo 'Неправильный логин или пароль!';   
            }
        } 
?>        
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить объявление</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/form.js"></script>
</head>
<body>
  <header class="header">
        <div class="top-block container-fluid">
          <div class="container">
            <span class="top-block_right"><?php echo $_SESSION['login']; ?></span>
            <a class="top-block_right" href="admin/logout.php">Выход</a>
          </div>
        </div>

      <ul class="breadcrumbs">
          <li><a href="index.php">ГЛАВНАЯ </a></li>
          <li><a href="admin/index.php">ЛИЧНЫЙ КАБИНЕТ </a></li>
          <li class="current">ДОБАВИТЬ ОБЪЯВЛЕНИЕ</li>
      </ul>
<!--         <div class="container">
            <div class="logo-block">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/4.png" alt="logo">
                    </a>
                    <div class="logo-title">
                        <span class="name">Анисия</span>
                        <span>агентство недвижимости</span>
                    </div>
                </div>
                
                <div class="phone-number">
                    <span>г. Елабуга</span>
                    <span>тел: 8-917-243-12-71</span>
                </div>
            </div>
        </div> -->
  </header>
  <h1 class="text-center">Добавить объявление</h1>

  <div class="container">
 <ul class="nav nav-pills" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="sale-tab" data-toggle="pill" href="#sale" role="tab" aria-controls="sale" aria-selected="true">Продать</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="rent-tab" data-toggle="pill" href="#rent" role="tab" aria-controls="rent" aria-selected="false">Сдать</a>
    </li>
  
</ul>
<div class="tab-content col-md-12" id="pills-tabContent">
  <div class="tab-pane fade show active" id="sale">

  <!-- Квартиры -->

      <form action="saveSale.php" class="form-sale" method="post" enctype="multipart/form-data">
        <div class="select-wrapper col-sm-3">
                <select name="property" id="property" onchange="set_action()">      
                    <option value = "1" selected="selected" onclick="selectFlat()">Квартиры</option>
                    <option value = "2" onclick="selectRoom()">Комнаты</option>
                    <option value = "3" onclick="selectHouse()">Дома</option>
                    <option value = "4" onclick="selectLand()">Земельные участки</option>   
                </select>
        </div> 

          <div id="form-section">
       <label class="col-sm-4">
                <h2>Адрес:</h2>
                  <input class="col-sm-12" type="text" name="address" placeholder="Например, ул. Нефтяников д. 7" required>
                </label>
                <h2>Параметры:</h2>
                <label>Количество комнат:
                  <select class="col-sm-4" name="num_of_rooms" id="number_rooms1" required>
                                          <option value="">-</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option> 
                                          <option value="5">5</option>
                                          <option value="6">больше 5</option>
                  </select>
                </label>
                <label>Тип дома:
                  <select class="col-sm-4" name="obj_type_id" id="type_of_house">
                                          
                                      <option value="Кирпичный">Кирпичный</option>
                                      <option value="Панельный">Панельный</option>
                                      <option value="Блочный">Блочный</option>
                                      <option value="Монолитный">Монолитный</option>
                                      <option value="Деревянный">Деревянный</option>
                  </select>
                </label>
                <label>Этаж:
                                <select class="col-sm-4" name="floor" id="floor1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                </select>
                </label>
                <label>Этажей в доме:
                                <select class="col-sm-4" name="floor_total" id="floors_in_house1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                </select>
                </label>
                <label>Общая площадь:
                <input type="text" name="square" required>
                </label>

                <label for="title">Текст объявления:</label>
                  <textarea class="col-sm-6" id="title" name="description" rows="5" cols="40" required></textarea>
                

                <label>Цена:
                  <input type="text" name="price" required>
                </label>
                <label>
                  <span class="">Фотографии</span>
                  <span class="">Вы можете прикрепить не более 20 фотографий</span>
                  <input class="form-uploader" accept="image/gif,image/png,image/jpeg,image/pjpeg" name="img" multiple="multiple" type="file">
                </label>
                <input type="submit">
          </div>
</form>

    <!-- Комнаты -->
          <div id="form-section-room" class="hidden">
      <form action="saveSale.php" class="form-sale" method="post" enctype="multipart/form-data">
          <input type="hidden" name="property" value="2">
                <label class="col-sm-4">
                <h2>Адрес:</h2>
                  <input class="col-sm-12" type="text" name="address" placeholder="Например, ул. Нефтяников д. 7" required>
                </label>
                <h2>Параметры:</h2>
                <label>Количество комнат в квартире:
                  <select class="col-sm-4" name="num_of_rooms" id="number_rooms1" required>
                                          <option value="">-</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option> 
                                          <option value="5">5</option>
                                          <option value="6">больше 5</option>
                  </select>
                </label>
                <label>Тип дома:
                  <select class="col-sm-4" name="obj_type_id" id="type_of_house">
                                          
                                      <option value="Кирпичный">Кирпичный</option>
                                      <option value="Панельный">Панельный</option>
                                      <option value="Блочный">Блочный</option>
                                      <option value="Монолитный">Монолитный</option>
                                      <option value="Деревянный">Деревянный</option>
                  </select>
                </label>
                <label>Этаж:
                                <select class="col-sm-4" name="floor" id="floor1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                </select>
                </label>
                <label>Этажей в доме:
                                <select class="col-sm-4" name="floor_total" id="floors_in_house1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                </select>
                </label>                
                <label>Площадь комнаты, кв.м:
                <input type="text" name="square" required>
                </label>

                <label for="title">Текст объявления:</label>
                  <textarea class="col-sm-6" id="title" name="description" rows="5" cols="40" required></textarea>
                

                <label>Цена:
                  <input type="text" name="price" required>
                </label>
                <label>
                  <span class="">Фотографии</span>
                  <span class="">Вы можете прикрепить не более 20 фотографий</span>
                  <input class="form-uploader" accept="image/gif,image/png,image/jpeg,image/pjpeg" name="img" multiple="multiple" type="file">
                </label>
                <input type="submit">
                </form>
          </div>

  <!-- Дома -->
          <div id="form-section-house" class="hidden">
       <form action="saveSale.php" class="form-sale" method="post" enctype="multipart/form-data">
          <input type="hidden" name="property" value ="3">
                <label>
                <h2>Адрес:</h2>
                  <input type="text" name="address" placeholder="Например, ул. Нефтяников д. 7" required>
                </label>
                <h2>Параметры:</h2>
                <label>Количество комнат:
                  <select name="num_of_rooms" id="number-rooms1" required>
                                          <option value="">-</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option> 
                                          <option value="5">5</option>
                                          <option value="6">больше 5</option>
                  </select>
                </label>
                <label>Тип дома:
                  <select name="obj_type_id" class="type-of-house1">
                                          
                                      <option value="Кирпичный">Кирпичный</option>
                                      <option value="Панельный">Панельный</option>
                                      <option value="Блочный">Блочный</option>
                                      <option value="Монолитный">Монолитный</option>
                                      <option value="Деревянный">Деревянный</option>
                  </select>
                </label>
                
                <label>Этажей в доме:
                                <select name="floor_total" class="floors_in-house1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                </label>                
                <label>Общая площадь, кв.м:
                <input type="text" name="square" required>
                </label>

                <label>Площадь участка, сот.
                 <input type="text" name="land_area" required> 
                </label>

                <label>Текст объявления:
                  <textarea name="description" rows="5" cols="40" required></textarea>
                </label>

                <label>Цена:
                  <input type="text" name="price" required>
                </label>
                <label>
                  <span class="">Фотографии</span>
                  <span class="">Вы можете прикрепить не более 20 фотографий</span>
                  <input class="form-uploader" accept="image/gif,image/png,image/jpeg,image/pjpeg" name="img" multiple="multiple" type="file">
                </label>
                <input type="submit">
              </form>
          </div>

  <!-- Земельные участки -->
          <div id="form-section-land" class="hidden">

              <form action="saveSale.php" class="form-sale" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="property" value="4">
                <label>
                <h2>Адрес:</h2>
                  <input type="text" name="address" placeholder="Например, ул. Нефтяников д. 7" required>
                </label>
                
                <label>Площадь участка:
                <input type="text" name="land_area" required>
                </label>

                <label>Текст объявления:
                  <textarea name="description" rows="5" cols="40" required></textarea>
                </label>

                <label>Цена:
                  <input type="text" name="price" required>
                </label>
                <label>
                  <span class="">Фотографии</span>
                  <span class="">Вы можете прикрепить не более 20 фотографий</span>
                  <input class="form-uploader" accept="image/gif,image/png,image/jpeg,image/pjpeg" name="img" multiple="multiple" type="file">
                </label>
                <input type="submit" name="sub" value ="Отправить">
              </form>
          </div>
  </div>



  <div class="tab-pane fade" id="rent">
   <!--  <form action="saveRent.php" class="form-rent" method="post"> -->
        <div class="select-wrapper col-sm-4">
                <select name="property1" id="property1" onchange="set_action1()">      
                    <option value = "1">Квартиры</option>
                    <option value = "1" onclick="selectRoom()">Комнаты</option>
                    <option value = "2" onclick="selectHouse()">Дома</option>  
                </select>
        </div> 
        <div id="form-section1">
          <form action="saveRent.php" method="post">
                <label>
                <h2>Адрес:</h2>
                  <input type="text" name="address" placeholder="Например, ул. Нефтяников
                   д. 7" value="<?=$_SESSION["address"]?>" required>
                </label>
                <h2>Параметры:</h2>
                <label>Количество комнат:
                  <select name="number-rooms" class="number-rooms1" required>
                                          <option value="">-</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option> 
                                          <option value="5">5</option>
                                          <option value="6">больше 5</option>
                  </select>
                </label>
                <label>Тип дома:
                  <select name="type-of-house" class="type-of-house1">
                                      <option value="">-</option>    
                                      <option value="Кирпичный">Кирпичный</option>
                                      <option value="Панельный">Панельный</option>
                                      <option value="Блочный">Блочный</option>
                                      <option value="Монолитный">Монолитный</option>
                                      <option value="Деревянный">Деревянный</option>
                  </select>
                </label>
                <label>Этаж:
                                <select name="floor" class="floor1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                </select>
                </label>
                <label>Этажей в доме:
                                <select name="floors_in-house" class="floors_in-house1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                </select>
                </label>                
                <label>Общая площадь:
                <input type="text" name="area" value="<?=$_SESSION["area"]?>" required>
                </label>

                <label>Текст объявления:
                  <textarea  name="title" rows="5" cols="40"><?=$_SESSION["title"]?></textarea>
                </label>

                <label>Цена:
                  <input type="text" name="price" value="<?=$_SESSION["price"]?>" required>
                </label>
                <label>
                  <span class="">Фотографии</span>
                  <span class="">Вы можете прикрепить не более 20 фотографий</span>
                  <input class="form-uploader" accept="image/gif,image/png,image/jpeg,image/pjpeg" name="image" multiple="multiple" type="file">
                </label>
                <input type="submit" name="sub">
            </form>
        </div> <!-- end form-section -->

                        <!-- дома -->
      <div id="form-section-house1" class="hidden">
        <form action="saveRent.php" method="post">
                <label>
                <h2>Адрес:</h2>
                  <input type="text" name="address" placeholder="Например, ул. Нефтяников д. 7" required>
                </label>
                <h2>Параметры:</h2>
                <label>Количество комнат:
                  <select name="number-rooms" class="number-rooms1" required>
                                          <option value="">-</option>
                                          <option value="1">1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option> 
                                          <option value="5">5</option>
                                          <option value="6">больше 5</option>
                  </select>
                </label>
                <label>Тип дома:
                  <select name="type-of-house" class="type-of-house1">
                                          
                                      <option value="Кирпичный">Кирпичный</option>
                                      <option value="Панельный">Панельный</option>
                                      <option value="Блочный">Блочный</option>
                                      <option value="Монолитный">Монолитный</option>
                                      <option value="Деревянный">Деревянный</option>
                  </select>
                </label>
                
                <label>Этажей в доме:
                                <select name="floors_in-house" class="floors_in-house1" required>
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                </label>                
                <label>Общая площадь:
                <input type="text" name="area" required>
                </label>

                <label>Текст объявления:
                  <textarea name="title" rows="5" cols="40" required></textarea>
                </label>

                <label>Цена:
                  <input type="text" name="price" required>
                </label>
                <label>
                  <span class="">Фотографии</span>
                  <span class="">Вы можете прикрепить не более 20 фотографий</span>
                  <input class="form-uploader" accept="image/gif,image/png,image/jpeg,image/pjpeg" name="image" multiple="multiple" type="file">
                </label>
                <input type="submit" name="sub">
          </form>
       </div> <!-- end form-section-house -->
    
  </div>
</div>
</div>

</body>
</html>