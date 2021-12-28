<? session_start(); include("check_log.php");?>
<html>
<head>
<title> Редактирование данных о банке </title>
</head>
<meta charset="utf-8">
<body>
<?php
 $conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die ("Нет такой таблицы!");
$rows=mysqli_query($conn, "SELECT deposit.id_dep as 'id_dep', deposit.name as 'name', deposit.perc as 'perc', banks.name as 'bank' FROM deposit LEFT JOIN banks ON (deposit.id_bank=banks.id_bank) WHERE id_dep='".$_GET['id']."' ");
 while ($st=mysqli_fetch_array($rows)) {
 $id = $st['id_dep'];
 $name = iconv("cp1251", "utf-8", $st['name']);
 $perc = iconv("cp1251", "utf-8", $st['perc']);
 $bank = iconv("cp1251", "utf-8", $st['bank']);
 }
print "<form action='save_edit_dep.php' method='get'>";
print "Название программы депозита: <input name='name' size='20' type='text'
value='".$name."'>";
print "<br>Процент  годовых: <input name='perc' size='20' type='text'
value='".$perc."'>";
print "<br>Банк: <input name='bank' disabled size='20' type='text'
value='".$bank."'>";
print "<input type='hidden' name='id' 
value='".$id."'>";
print "<br><input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
банков </a>";
?>
</body>
</html>