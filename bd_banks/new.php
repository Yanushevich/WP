<html>
<head> <title> Добавление нового банка </title> </head>
<body>
<H2>Введите данные:</H2>
<form action="save_new.php" metod="get">
 Наименование: <input name="name" size="20" type="text">
<br>ИНН: <input name="inn" size="20" type="text">
<br>Страна: <input name="country" size="20" type="text">
<br>Класс надежности: <input name="class" size="20" type="text">
<br>Объем активов (в млн.дол.): <input name="assets" size="20" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку банков </a>
</body>
</html>