<title> Янушевич Максим ПИ-322</title>
<?php
  $a=rand(3,20);
  print('Случайное число равно ' . $a);
  $arr=array();
  print ('<p> Массив из ' . $a . ' элементов, заполненный случайными числами: ');
  for ($i = 0; $i < $a; $i++) {
    $arr[$i]=rand(10,99);
    print ($arr[$i] . ' ');
  }

  print ('<p> Массив в отсортированном виде: ');
  sort($arr);
  for ($i = 0; $i <= $a; $i++) {
    print ($arr[$i] . ' ');
  }

  $arr_rev=array_reverse($arr);
  print ('<p> Элементы массива в обратном порядке: ');
  for ($i = 0; $i <= $a; $i++) {
    print ($arr_rev[$i] . ' ');
  }
 
?>