<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Форма регистрации</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<header class="header">
        <div class="top-block container-fluid">
            <!-- <div class="container">
                <span class="top-block_link_icon"></span>
                 <a class="top-block_link" href="admin/auth.php">Вход и регистрация</a>
            </div> -->
        </div>
        <div class="container">
            <div class="logo-block">
                <div class="logo">
                    <a href="../index.php">
                        <img src="../images/4.png" alt="logo">
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
	<div class="container">
		<h1 class="header-form-reg">Форма регистрации:</h1>
		<div class="form-wrap col-md-12">
			<form action="reg.php" class="form-reg" method="post">
				<input type="text" name="login" placeholder="ЛОГИН" required>
				<input type="password" name="password" placeholder="ПАРОЛЬ" required>
				<input type="password" name="password_confirm" placeholder="ПОДТВЕРДИТЕ ПАРОЛЬ" required>
				<input type="submit" value='Отправить'>
			</form>
		</div>
	</div>
	<?php
	require '../config.php';
	require '../function.php';
//Если форма регистрации отправлена и ВСЕ поля непустые...
	if (
		!empty($_REQUEST['password'])
		and !empty($_REQUEST['password_confirm'])
		and !empty($_REQUEST['login'])
	) {

		//Пишем логин и пароль из формы в переменные (для удобства работы):
		$login = $_REQUEST['login']; 
		$password = $_REQUEST['password']; 
		$password_confirm = $_REQUEST['password_confirm']; //подтверждение пароля

		//Если пароль и его подтверждение совпадают...
		if ($password == $password_confirm) {
			/*
				Выполняем проверку на незанятость логина.
				Ответ базы запишем в переменную $is_login_free. 

				ВЫБРАТЬ ИЗ таблицы_users ГДЕ логин = $login.
			*/
			
            $db = new QueryBuilder;
            $db->getOne("users", $login);

			//Если $is_login_free пустой - то логин не занят!
			if (empty($isLoginFree)) {
			
					//Генерируем соль с помощью функции generateSalt() и солим пароль...
				$salt = generateSalt(); //генерируем соль
				$saltedPassword = md5($password.$salt); //соленый пароль
				
				/*
					Формируем и отсылаем SQL запрос:

					ВСТАВИТЬ В таблицу_users УСТАНОВИТЬ 
					логин = $login, пароль = $saltedPassword, salt = $salt
				*/
                $data = [
                        "login" => $login,
                        "password" => $saltedPassword,
                        "salt" => $salt
                ];
                $db->store("users", $data);

				//Выведем сообщение об успешной регистрации:
				echo 'Вы успешно зарегистрированы!';
			}
			//Если $is_login_free НЕ пустой - то логин занят!
			else {
				echo 'Такой логин уже занят!';
			}
		}
		//Если пароль и его подтверждение НЕ совпадают - выведем ошибку:
		else {
			echo 'Пароли не совпадают!';
		}
	}
	//Не заполнено какого-либо из полей.
	else {
		echo 'Поля не могут быть пустыми!';
	}
?>
</body>
</html>
