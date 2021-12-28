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
$result=mysqli_query($conn,"SELECT deposit.id_dep as 'id_dep', deposit.name as 'name', banks.name as 'bank' FROM deposit LEFT JOIN banks ON (banks.id_bank = deposit.id_bank)");
?>
<H2>Введите данные:</H2>
<form action="save_new_vkl.php" metod="get">
 Дата: <input name="data" size="20" type="date">
<br>Стартовая сумма: <input name="start" type="text">
<br>Программа депозита:
 <?php
echo '<select name="d">
<option>...</option>';
 while($row = mysqli_fetch_array($result)) {
echo  '<option value='.$row['id_dep'].'>'.iconv("cp1251", "utf-8", $row['name']).' - '.iconv("cp1251", "utf-8", $row['bank']).'</option>';
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