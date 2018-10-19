<?php
require 'config.php';
require 'function.php';
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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Агентство недвижимости "Анисия"</title>
  </head>
  <body>
  <header class="header">
        <div class="top-block container-fluid">
            <div class="container">

                    <a class="text-right" href="admin/index.php">Подать объявление</a>
                    <span class="top-block_link_icon"></span>
                     <a class="top-block_link" href="admin/auth.php"><?php if($_SESSION['auth'] == true)
                     {echo $_SESSION['login'];} else echo "Вход и регистрация";?></a>

            </div>
        </div>
        <div class="container">
            <div class="logo-block row">
                <div class="logo">
                    <a href="#">
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
<div class="wrapper">
    <div class="container">

            <form action="filter.php" class="search-form" method="post">
                <div class="row1 row">

                    <div class="select-wrapper col-sm-2">
                        <select name="property" id="property">
                            <option>Недвижимость</option>
                            <option value = "1">Квартиры</option>
                            <option value = "2">Комнаты</option>
                            <option value = "3">Дома</option>
                            <option value = "4">Земельные участки</option>       
                        </select>
                    </div> 

                    <div class="select-wrapper  col-sm-7 custom-col-sm-7">   
                        <input type="search" class="search" name="search" placeholder="Поиск по объявлениям">
                    </div> 

                    <div class="select-wrapper col-sm-2">
                        <select name="city" id="city">
                            <option value="1">Елабуга</option>
                            <option value="2">Набережные Челны</option>
                        </select>
                    </div> 
                    
                    <div class="search-form_submit select-wrapper col-sm-1">
                        <input type="submit" class="submit" value="Найти">
                    </div>
                </div>

                    <div class="search-filters-wrapper">
                        <div class="search-filters-main container">
                           <div class="row2 row"> 
                               <div class="search-filters-main-filter-control col-sm-3">
                                   <select name="select-select" class ="select-select">
                                       <option value="1">Продам</option>
                                       <option value="2">Сдам</option>
                                   </select>
                               </div>

                                <div class="search-filters-main-filter-control col-sm-3">
                                    <select name="number-rooms" id="number-rooms">
                                        <option>Количество комнат</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">больше 5</option>
                                    </select>
                                </div>
                                <div class="search-filters-main-filter-control col-sm-3">
                                    <select name="type-object" id="type-object">
                                        <option value="">Вид объекта</option>
                                        <option value="1">Вторичка</option>
                                        <option value="2">Новостройка</option>
                                    </select>
                                </div>
                         
                                <div class="search-filters-main-filter-control col-sm-3">
                                      <select name="floor" id="floor">
                                        <option>Этаж</option>
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
                                </div>
                             </div>   
                         <div class="row3 row">    
                            <div class="search-filters-main-filter-control col-sm-3">
                                <select name="floors_in-house" id="floors_in-house">
                                    <option>Этажей в доме</option>
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
                            </div>
                            <div class="search-filters-main-filter-control col-sm-3">
                                <select name="type-of-house" id="type-of-house">
                                    <option>Тип дома</option>
                                    <option value="Кирпичный">Кирпичный</option>
                                    <option value="Панельный">Панельный</option>
                                    <option value="Блочный">Блочный</option>
                                    <option value="Монолитный">Монолитный</option>
                                    <option value="Деревянный">Деревянный</option>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
               </form>
         </div>
    </div>




<!--  --><?php
//  $url = $_SERVER['REQUEST_URI'];
//  echo($url);
//  require_once 'app/controllers/'.$url.'.php';
//  $controller = new $url;
//  ?>




    <div class="catalog container">

<?php
$db = new QueryBuilder;
$art = $db->all("apartments");

?>
<?php
  foreach($art as $task):?>
        
            <div class="item row">
            <div class="photo col-md-3 col-xs-12">
                <a class="photo-wrapper" href="itemPage.php?id=<?= $task['id'];?>">
                    <img src="images/<?php if(!empty($task['img'])) {echo $task['img'];} else echo "notphoto.png"; ?>" style = "width: 140px; height: 105px;">
                </a>        
            </div>
            <div class="description col-md-5 col-xs-4">
                <div class="item_header">
                    <h3 class="item-description-title">
                        <a class="item-daescription-title-link" href="itemPage.php?id=<?= $task['id'];?>"><?php if(($task['property']) == 1) { echo $task['num_of_rooms'].'-к квартира, '.$task['square'].' кв.м, '.$task['floor'].'/'.$task['floor_total'].' эт.';} elseif (($task['property']) == 3) {echo "Дом ". $task['square'].' кв.м на участке '.$task['land_area'].' соток';} elseif (($task['property']) == 2) {
                    echo "Комната, ".$task['square'].' кв.м, в '.$task['num_of_rooms'].'-к квартире';
                } ?></a>
                    </h3> 
                    Адрес: <span class="item-address"><?php echo $task['address']; ?></span>     
                </div>
                <div class="item-content">
                    <p>О доме: <span class="wall">кирпичный</span></p>
                    <p>Описание: <span><?php echo mb_substr($task['description'], 0, 50, 'utf-8'); ?> ...
                                 </span>
                    </p>
                </div>
            </div>
            <div class="right-block col-md-4 col-xs-12 text-center">
                <div class="item-price">
                    <span class="item-price-content"><?php echo number_format($task['price'], 0, ',', ' '); ?> руб.</span>
                </div>
                <div class="more"><span><a href="itemPage.php?id=<?= $task['id'];?>">подробнее</a></span></div>
            </div>
        </div>
    
<?php  
  endforeach;
?>
        <?php

        require 'vendor/autoload.php';

        use JasonGrimes\Paginator;

        $totalItems = 1000;
        $itemsPerPage = 5;
        $currentPage = 3;
        $urlPattern = '/foo/page/(:num)';

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

        ?>
        <?php
        echo $paginator;
        ?>


</div> <!-- end catalog -->

<footer class="footer container-fluid">
    <div class="container">
         <p class="copyright">Copyright &copy; 2017 Агентство недвижимости "Анисия". Все права защищены.</p>
    </div>
</footer>

       <!-- modal-auth-content -->
<!-- <script>
    $(document).ready(function() {
        $("auth-submit").bind('click(function() {
            $.ajax({
                url: 'admin/auth.php',
                type: 'POST',
                dataType: 'html',
                data: {param1: 'value1'},
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });', eventData, function(event) {
            /* Act on the event */
        });
    });    
</script> -->

<div class="modal-content col">
    <div class="auth">
        <button class="modal-content-close" type="button" title="Закрыть">Закрыть</button>
            <h2 class="modal-content-title">ВХОД</h2>
            <p>Введите, пожалуйста, свой логин и пароль</p>
            <form class="login-form" action="admin/auth.php" method="post">
                <input class="icon-user col" type="text" name="login" placeholder="ЛОГИН" required>
                <input class="icon-password col" type="password" name="password" placeholder="ПАРОЛЬ" required>
                <label class="login-checkbox">
                     <input type="checkbox" name="remember" >
                     <span class="checkbox-indicator"></span>
                     ЗАПОМНИТЕ МЕНЯ
                </label>
                    <a class="restore" href="#">Я ЗАБЫЛ ПАРОЛЬ!</a>
                     <button id="auth-submit" class="btn" type="submit">ВОЙТИ</button>
            </form>
    </div> 
    <div class="registration">
        <a class="registration-link" href="admin/reg.php">
            <span>Зарегистрироваться</span>
        </a>
    </div>       
</div>
<div class="modal-overlay"></div>
 <script>
        var link = document.querySelector(".top-block_link");
        var popup = document.querySelector(".modal-content");
        var close = document.querySelector(".modal-content-close");
        var login = popup.querySelector("[name = login]");
        var overlay = document.querySelector(".modal-overlay");

        link.addEventListener("click", function(event){
                event.preventDefault();
                popup.classList.add("modal-content-show");
                overlay.classList.add("modal-overlay-show");
                login.focus();
        });

        close.addEventListener("click", function(event) {
                event.preventDefault();
                popup.classList.remove("modal-content-show");
                overlay.classList.remove("modal-overlay-show");
        });

    </script>
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>

    

