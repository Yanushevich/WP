<title> Янушевич Максим ПИ-322</title>
<p>Вариант 13
</p>
<?php
  $a=rand(-20,20);
  $b=rand(-20,20);
  $c=rand(-20,20);
  $d=rand(-20,20);
  print ('$a=' . $a . '<br>' . '$b=' . $b . '<br>' . '$c=' . $c . '<br>' . '$d=' . $d . '<br>');
  print ('Функция равна ' . $c*($b+23)/(($a/2)-4*$d-1) . '<br>');
  print ('Функция равна ' . $c . '*(' . $b . '+23)/((' . $a . '/2)-4*' . $d . '-1)');
?>