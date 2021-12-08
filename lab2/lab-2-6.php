<body>
<title> Янушевич Максим ПИ-322</title>
<?php
  static $a = array();
  require('functions.php');
  usl();

  $m=rand(2,7);
  $n=rand(2,7);

  $a=massiv($a, $m, $n);

  out($a, $m, $n);
  $k=rand(-5,5);
  echo '<p>Число k равно '. $k;
  echo '<p>Сумма элементов равна ' . calc($a, $m, $n, $k);
  
?>

</body>