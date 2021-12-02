<title> Янушевич Максим ПИ-322</title>
<?php
  define('NUM_E', 2.71828);
  print ('Число е равно ' . NUM_E . '<br>');
  $num_e1=NUM_E;
  settype($num_e1, integer);
  print ('$num_e1=' . $num_e1 . ' - ' . gettype($num_e1));
?>