<?php

function debug($arr) {
    echo '<pre>' . print_r($arr, true). '</pre>';
}

function isAdmin($login) {

}

function generateSalt()
	{
		$salt = '';
		$saltLength = 8; //длина соли
		for($i=0; $i<$saltLength; $i++) {
			$salt .= chr(mt_rand(33,126)); //символ из ASCII-table
		}
		return $salt;
	}

function redirect_to($new_location) {
	header("Location: " . $new_location);
	exit;
}

function selectAllByLogin() {
$db = new QueryBuilder;
$art = $db->all("apartments");

//Выбираем записи по логину
$author = $_SESSION['login'];
foreach ($art as $elem) {
    if($elem['author'] == $author) {
        $artNew[]= $elem;
    	}
	}
}

