<?php

  function usl() {
    echo "<p> Найти сумму элементов A(i,j) массива A(m,n), имеющих заданную разность индексов i-j=k. Число k целое, но не обязательно положительное.";
  }

  function massiv($a, $m, $n) {
    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
	$a[$i][$j]=rand(1,10);
      }
    }
  return $a;
  }

  function out($a, $m, $n) {
    echo "<p><table border=1 >";
    for ($i=0; $i<$m; $i++) {
      echo "<tr>";
      for ($k=0; $k<$n; $k++) {
        echo "<td align=center width=25 height=32>";
	echo $a[$i][$k];
        echo "</td>";
      }
      echo "</tr>";
      } 
    echo "</table>";
  }

  function calc($a, $m, $n, $k) {
    $sum=0;
    for ($i = 0; $i < $m; $i++) {
      for ($j = 0; $j < $n; $j++) {
	if ($i-$j==$k) { $sum+=$a[$i][$j]; }
      }
    }
  return $sum;
  }


?>