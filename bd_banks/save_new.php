<? session_start(); include("check_log.php");
 // Подключение к базе данных:
 $conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу");
 mysqli_query($conn,'SET NAMES cp1251'); // Тип кодировки
 mysqli_select_db($conn, "heroku_60a6c74570f65ce") or die("Нет такой таблицы!");
 // Строка запроса на добавление записи в таблицу:
 
 $sql_add = "INSERT INTO banks SET name='" . iconv("utf-8", "cp1251", $_GET['name'])
."', inn='".$_GET['inn']."', country='".iconv("utf-8", "cp1251", $_GET['country'])."', class='".iconv("utf-8", "cp1251", $_GET['class']).
"', assets='".$_GET['assets']."'";
 mysqli_query($conn,$sql_add); // Выполнение запроса
 if (mysqli_affected_rows($conn)>0) // если нет ошибок при выполнении запроса
 { print "<p> Информация внесена в базу данных.";
 print "<p><a href=\"index.php\"> Вернуться к списку
банков </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку банков </a>"; }
?>
