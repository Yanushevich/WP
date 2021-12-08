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

  $arr=array_reverse($arr);
  print ('<p> Элементы массива в обратном порядке: ');
  for ($i = 0; $i <= $a; $i++) {
    print ($arr[$i] . ' ');
  }

  array_pop($arr);
  print ('<p> Массив после удаления последнего элемента: ');
  for ($i = 0; $i <= $a; $i++) {
    print ($arr[$i] . ' ');
  }

  print ('<p> Сумма элементов массива: ' . array_sum($arr));

  print ('<p> Количество элементов в массиве: ' . (count($arr) + 1));

  print ('<p> Среднее арифметическое для элементов массива: ' . round((array_sum($arr)/(count($arr)+1)), 2));

  if (in_array(50, $arr)) {
    print ('<p> Число 50 есть в массиве');
  }
  else { print ('<p> Числа 50 в массиве не оказалось'); }

  $arr=array_unique($arr);
  print ('<p> Массив из уникальных элементов: ');
  for ($i = 0; $i <= $a; $i++) {
    print ($arr[$i] . ' ');
  }
 
?>