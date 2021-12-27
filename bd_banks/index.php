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

<h2>Программы депозитов:</h2>
<table border="1">
<tr> 
 <th> Название </th> <th> Процент годовых </th> <th> Банк </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($conn,"SELECT deposit.id_dep as 'id_dep', deposit.name as 'name', banks.name as 'bank_name', deposit.perc as 'perc'
FROM deposit 
LEFT JOIN banks ON (banks.id_bank = deposit.id_bank)"); // запрос на выборку сведений о пользователях
while($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo ("<td>" . iconv("cp1251", "utf-8", $row['name']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['perc']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['bank_name']) . "</td>");
 echo "<td><a href='edit_dep.php?id=" . $row['id_dep']. "'>Редактировать</a></td>";
 echo "<td><a href='delete_dep.php?id=" . $row['id_dep']. "'>Удалить</a></td>";
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего программ: $num_rows </p>");
?>
<p> <a href="new_dep.php"> Добавить программу </a>

<h2>Вклады:</h2>
<table border="1">
<tr> 
 <th> Депозит </th> <th> Дата </th> <th> Стартовая сумма </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($conn,"SELECT banks.name as 'bank', vklad.id_vklad as 'id_vklad', deposit.name as 'dep', vklad.data as 'data', vklad.start as 'start' FROM vklad LEFT JOIN deposit ON (vklad.id_dep = deposit.id_dep) LEFT JOIN banks ON (deposit.id_bank = banks.id_bank)"); 
while($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo ("<td>" . iconv("cp1251", "utf-8", $row['dep']) . ' (' . iconv("cp1251", "utf-8", $row['bank']) . ')' . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['data']) . "</td>");
 echo ("<td>" . iconv("cp1251", "utf-8", $row['start']) . "</td>");
 echo "<td><a href='edit_vkl.php?id=" . $row['id_vklad']. "'>Редактировать</a></td>";
 echo "<td><a href='delete_vkl.php?id=" . $row['id_vklad']. "'>Удалить</a></td>";
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего вкладов: $num_rows </p>");
?>
<p> <a href="new_vkl.php"> Добавить вклад </a>

<p> <a href="inf_pdf.php"> Выгрузить данные в PDF </a>
<p> <a href="inf_xls.php" download> Выгрузить данные в Excel </a>

</body> </html>
