<html> <body>
<?php
 $conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die("Нет такой таблицы!");
 $zapros="UPDATE deposit SET name='".iconv("utf-8", "cp1251", $_GET['name']).
"', perc='".iconv("utf-8", "cp1251", $_GET['perc'])."' WHERE id_dep='".iconv("utf-8", "cp1251", $_GET['id'])."'";
 mysqli_query($conn, $zapros);
 if (mysqli_affected_rows($conn)>0) {
 echo 'Все сохранено . <a href="index.php"> Вернуться к списку </a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться к списку </a> '; }
?>
</body> </html>