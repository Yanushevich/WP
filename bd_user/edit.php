<html>
<head>
<title> Редактирование данных о пользователе </title>
</head>
<meta charset="utf-8">
<body>
<?php
 $conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die ("Нет такой таблицы!");
$rows=mysqli_query($conn, "SELECT id_user, user_name, user_login,
user_password, user_e_mail, user_info FROM user WHERE id_user='".$_GET['id']."'");
 while ($st=mysqli_fetch_array($rows)) {
 $id = $st['id_user'];
 $name = iconv("cp1251", "utf-8", $st['user_name']);
 $login = iconv("cp1251", "utf-8", $st['user_login']);
 $password = iconv("cp1251", "utf-8", $st['user_password']);
 $e_mail = iconv("cp1251", "utf-8", $st['user_e_mail']);
 $info = iconv("cp1251", "utf-8", $st['user_info']);
 }
print "<form action='save_edit.php' method='get'>";
print "Имя: <input name='name' size='50' type='text'
value='".$name."'>";
print "<br>Логин: <input name='login' size='20' type='text'
value='".$login."'>";
print "<br>Пароль: <input name='password' size='20' type='password'
value='".$password."'>";
print "<br>Е-mail: <input name='e_mail' size='30' type='text'
value='".$e_mail."'>";
print "<br>Информация: <textarea name='info' rows='4'
cols='40'>".$info."</textarea>";
print "<input type='hidden' name='id' 
value='".$id."'>";
print "<br><input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
пользователей </a>";
?>
</body>
</html>