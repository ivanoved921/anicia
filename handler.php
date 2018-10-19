<?php 
     session_start();

// Проверяем установлен ли массив файлов и массив с переданными данными
if(isset($_FILES) && isset($_FILES['img'])) {
 
  //Переданный массив сохраняем в переменной
  $img = $_FILES['img'];
 
  // Проверяем размер файла и если он превышает заданный размер
  // завершаем выполнение скрипта и выводим ошибку
  // if ($img['size'] > 200000) {
  //   die('error');
  // }
 
  // Достаем формат изображения
  $imageFormat = explode('.', $img['name']);
  $imageFormat = array_pop($imageFormat); 
 
  // Генерируем новое имя для изображения. Можно сохранить и со старым
  // но это не рекомендуется делать
  $imageFullName = 'images/' . hash('crc32',time()) . '.' . $imageFormat;
 
  // Сохраняем тип изображения в переменную
  $imageType = $img['type'];
 
  // Сверяем доступные форматы изображений, если изображение соответствует,
  // копируем изображение в папку images
  if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
    if (move_uploaded_file($img['tmp_name'],$imageFullName)) {
      $_SESSION['status'] = 'success';
    } else {
      echo 'error';
    }
  }
}
   
?>
