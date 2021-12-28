<?
session_start();
?>
<title> Авторизация </title>
<body>
<form method="post" action="<?php print $PHP_SELF ?>">
<?
//include("check_log.php");
echo "Введите логин:<br><input type='text' name='login' required>";
echo "<br>Введите пароль:<br><input type='password' name='password' required>";
?>
<br><input type='submit' name='sign' value='Вход'>
</form>
<br> Админ (type = 2) - admin admin
<br> Оператор (type = 1) - oper oper
</body>
<?
if (isset($_POST["sign"])) {
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу");
 mysqli_query($conn,'SET NAMES cp1251');
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die("Нет такой таблицы!");
$result=mysqli_query($conn,"SELECT id, type FROM users WHERE username = '".$_POST['login']."' and password = md5('".$_POST['password']."')");
if (mysqli_affected_rows($conn)>0) {
 $row=mysqli_fetch_array($result);
 $_SESSION['userid'] = $row['id'];
 $_SESSION['type'] = $row['type'];
 echo '<script type="text/javascript">window.open("index.php","_self");</script>';
 exit;
} else { echo "<br>Неверный логин/пароль"; }
}
?>