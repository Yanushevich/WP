<title> Янушевич Максим ПИ-322</title>
<?php
  $n=rand(5,15);
  print('Случайное число (от 5 до 15) равно ' . $n);
  $a=array();
  print ('<p> Массив из ' . $n . ' элементов, заполненный случайными числами:');
  $sum=0;
  for ($i = 0; $i < $n; $i++) {
    $a[$i]=rand(-100,100);
    print (' ' . $a[$i]);
    if ($a[$i]%2!=0) {
      if ($a[$i]<0) {
	$sum+=$a[$i];
      }
    }
  }
  
  print ('<p> Сумма элементов, которые нечетны и отрицательны: ' . $sum);

?>