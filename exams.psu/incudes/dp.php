<?php
$link = '127.0.0.1';
$login= 'root';
$password = '';
$bd = 'exams';
$connection = mysqli_connect($link,$login,$password,$bd);

if ($connection == false)
	{
		echo '<div class="alert alert-danger" role="alert">'.'Не удалось установить соединение с базой данных!'.'</div>';
		/*echo mysqli_connect_error();*/
		exit();
	}/*else{
		echo '<div class="alert alert-success" role="alert">'.'Успешное подключение к Базе Данных!'.'</div>';
		}*/