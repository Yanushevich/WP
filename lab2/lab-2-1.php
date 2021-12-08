<title> Янушевич Максим ПИ-322</title>
<?php
  $treug=array();
  $kvd=array();

  for ($n = 1; $n <= 10; $n++)
  {
    $treug[$n]=$n*($n+1)/2;
    print ($treug[$n] . " ");
  }
    print ("<br>");
  for ($n = 1; $n <= 10; $n++)
  {
    $kvd[$n]=$n*$n;
    print ($kvd[$n] . " ");
  }

?>