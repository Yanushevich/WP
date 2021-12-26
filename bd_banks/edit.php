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
$rows=mysqli_query($conn, "SELECT id_bank, name, inn,
country, class, assets FROM banks WHERE id_bank='".$_GET['id']."'");
 while ($st=mysqli_fetch_array($rows)) {
 $id = $st['id_bank'];
 $name = iconv("cp1251", "utf-8", $st['name']);
 $inn = iconv("cp1251", "utf-8", $st['inn']);
 $country = iconv("cp1251", "utf-8", $st['country']);
 $class = iconv("cp1251", "utf-8", $st['class']);
 $assets = iconv("cp1251", "utf-8", $st['assets']);
 }
print "<form action='save_edit.php' method='get'>";
print "Наименование: <input name='name' size='50' type='text'
value='".$name."'>";
print "<br>ИНН: <input name='inn' size='20' type='text'
value='".$inn."'>";
print "<br>Страна: <input name='country' size='20' type='text'
value='".$country."'>";
print "<br>Класс надежности: <input name='class' size='20' type='text'
value='".$class."'>";
print "<br>Объем активов (в млн.дол.): <input name='assets' size='20' type='text'
value='".$assets."'>";
print "<input type='hidden' name='id' 
value='".$id."'>";
print "<br><input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
банков </a>";
?>
</body>
</html>