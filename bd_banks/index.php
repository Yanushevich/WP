<html>
<meta charset="utf-8">
<head> <title> Сведения о банках </title> </head>
<body>
<?php

$conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die("Нет такой таблицы!");
?>

<h2>Банки:</h2>
<table border="1">
<tr> 
 <th> Наименование </th> <th> Страна </th> <th> Объем активов (в млн.дол.)</th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($conn,"SELECT id_bank, name, country, assets
FROM banks"); // запрос на выборку сведений о пользователях
while($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo ("<td>" . iconv("cp1251", "utf-8", $row['name']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['country']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['assets']) . "</td>");
 echo "<td><a href='edit.php?id=" . $row['id_bank']. "'>Редактировать</a></td>";
 echo "<td><a href='delete.php?id=" . $row['id_bank']. "'>Удалить</a></td>";
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего банков: $num_rows </p>");
?>
<p> <a href="new.php"> Добавить банк </a>

</body> </html>
