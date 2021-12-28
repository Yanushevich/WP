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
$rows=mysqli_query($conn, "SELECT banks.name as 'bank', vklad.id_vklad as 'id_vklad', vklad.data as 'data', vklad.start as 'start', deposit.name as 'dep' FROM vklad LEFT JOIN deposit ON (deposit.id_dep=vklad.id_dep) LEFT JOIN banks ON (deposit.id_bank=banks.id_bank) WHERE id_vklad='".$_GET['id']."' ");
 while ($st=mysqli_fetch_array($rows)) {
 $id = $st['id_vklad'];
 $data = $st['data'];
 $start = iconv("cp1251", "utf-8", $st['start']);
 $dep = iconv("cp1251", "utf-8", $st['dep']);
 $bank = iconv("cp1251", "utf-8", $st['bank']);
 }
print "<form action='save_edit_vkl.php' method='get'>";
print "Стартовая сумма: <input name='start' size='20' type='text'
value='".$start."'>";
print "<br>Дата: <input name='data' size='20' type='date'
value='".$data."'>";
print "<br>Программа депозита: <input name='bank' disabled size='20' type='text'
value='".$dep . ' - ' .$bank."'>";
print "<input type='hidden' name='id' 
value='".$id."'>";
print "<br><input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
банков </a>";
?>
</body>
</html>