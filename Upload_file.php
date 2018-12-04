<?php
/*Загрузка файла через форму*/
$uploaddir = './';
$uploadfile = $uploaddir.basename($_FILES['filename']['name']);

/* Копируем или переносим файл из каталога для временного хранения файлов:*/
if (copy($_FILES['filename']['tmp_name'], $uploadfile)){
	echo "<h3>Файл успешно загружен на сервер</h3>";
} else { 
	echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
	/*echo "<p>".$_FILES['filename']['error']."</p>";*/
	exit;
}

/*Выводим информацию о загруженном файле:*/
echo "<h2>Информация о загруженном на сервер файле: </h2>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['filename']['name']."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['filename']['type']."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['filename']['size']."</b></p>";
echo "<p><b>Временное имя и расположение файла: ".$_FILES['filename']['tmp_name']."</b></p>";

/*Переход на страницу поиска категорий и товаров*/
echo 	'<form method="post" action="Parser.php">
			<input type="submit" name="search_button_click" value="Начать поиск" />
		</form>';