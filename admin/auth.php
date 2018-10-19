<?php
require '../config.php';
require '../function.php';
//Если форма авторизации отправлена...
    if ( !empty($_POST['password']) and !empty($_POST['login']) ) {
        //Пишем логин и пароль из формы в переменные (для удобства работы):
        $login = $_POST['login']; 
        $password = $_POST['password']; 

        /*
            Формируем и отсылаем SQL запрос:
            ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login
        */
           $db = new QueryBuilder;
           $user = $db->getOne("users", $login); 
          
        // $query = 'SELECT*FROM users WHERE login="'.$login.'"';
        // $result = mysqli_query($conDB,$query); //ответ базы запишем в переменную $result

        //Преобразуем ответ из БД в нормальный массив PHP:
        // $user = mysqli_fetch_assoc($result); 

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
                $_SESSION['password'] = $saltedPassword; 
                redirect_to('index.php'); 
            }
            //Если соленый пароль из базы НЕ совпадает с соленым паролем из формы...
            else {
                // header('location: ../index.php');
                echo 'Неправильный логин или пароль!';
                
            }
        } else {
            echo 'Нет такого логина!';
        }
    }
?>

