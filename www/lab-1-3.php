<?php
  define('NUM_E', 2.71828);
  print ('����� � ����� ' . NUM_E . '<br>');
  $num_e1=NUM_E;
  settype($num_e1, string);
  print ('$num_e1=' . $num_e1 . ' - ' . gettype($num_e1));
?>