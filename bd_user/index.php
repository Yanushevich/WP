<html>
<head> <title> Сведения о прользователях сайта </title> </head>
<body>
<?php
 mysql_connect("localhost", "root") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysql_query('SET NAMES utf-8'); // тип кодировки
 // подключение к базе данных:
 mysql_select_db("users") or die("Нет такой таблицы!");
?>

<h2>Зарегистрированные пользователи:</h2>
<table border="1">
<tr> 
 <th> Имя </th> <th> E-mail </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysql_query("SELECT id_user, user_name, user_e_mail
FROM user"); // запрос на выборку сведений о пользователях
while ($row=mysql_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['user_name'] . "</td>";
 echo "<td>" . $row['user_e_mail'] . "</td>";
 echo "<td><a href='edit.php?id=" . $row['id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete.php?id=" . $row['id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysql_num_rows($result); // число записей в таблице БД
print("<P>Всего пользователей: $num_rows </p>");
?>
<p> <a href="new.php"> Добавить пользователя </a>

</body> </html>
