<?php
 $conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die ("Нет такой таблицы!");
 $zapros="DELETE FROM vklad WHERE id_vklad=" . $_GET['id'];
 mysqli_query($conn,$zapros);
 header("Location: index.php");
 exit;
?>
