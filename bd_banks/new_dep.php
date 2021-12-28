<? session_start(); include("check_log.php");?>
<html>
<head> <title> Добавление новой программы депозитов </title> </head>
<body>
<?php

$conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die("Нет такой таблицы!");
$result=mysqli_query($conn,"SELECT * FROM banks");
?>
<H2>Введите данные:</H2>
<form action="save_new_dep.php" metod="get">
 Наименование: <input name="name" size="20" type="text">
<br>Процент годовых: <input name="perc" maxlength="3" type="text">
<br>Банк:
 <?php
echo '<select name="z">
<option>...</option>';
 while($row = mysqli_fetch_array($result)) {
echo  '<option value='.iconv("cp1251", "utf-8", $row['id_bank']).'>'.iconv("cp1251", "utf-8", $row['name']).'</option>';
}
echo '</select>'; 
?>

<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку </a>
</body>
</html>