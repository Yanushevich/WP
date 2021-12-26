<?php
 // Подключение к базе данных:
 $conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу");
 mysqli_query($conn,'SET NAMES cp1251'); // Тип кодировки
 mysqli_select_db($conn, "heroku_60a6c74570f65ce") or die("Нет такой таблицы!");
 // Строка запроса на добавление записи в таблицу:
 
 $sql_add = "INSERT INTO user SET user_name='" . iconv("utf-8", "cp1251", $_GET['name'])
."', user_login='".iconv("utf-8", "cp1251", $_GET['login'])."', user_password='"
.iconv("utf-8", "cp1251", $_GET['password'])."', user_e_mail='".iconv("utf-8", "cp1251", $_GET['e_mail']).
"', user_info='".iconv("utf-8", "cp1251", $_GET['info']). "'";
 mysqli_query($conn,$sql_add); // Выполнение запроса
 if (mysqli_affected_rows($conn)>0) // если нет ошибок при выполнении запроса
 { print "<p>Спасибо, вы зарегистрированы в базе данных.";
 print "<p><a href=\"index.php\"> Вернуться к списку
пользователей </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку книг </a>"; }
?>
