<title> Янушевич Максим ПИ-322</title>
<?php
  $treug=array();
  $kvd=array();

  print ('$treug=');
  for ($n = 1; $n <= 10; $n++)
  {
    $treug[$n]=$n*($n+1)/2;
    print ($treug[$n] . " ");
  }

  print ("<br>");
  print ('$kvd=');
  for ($n = 1; $n <= 10; $n++)
  {
    $kvd[$n]=$n*$n;
    print ($kvd[$n] . " ");
  }

  print ("<br>");
  print ('$rez=');
  $rez=array();
  $rez=array_merge($treug,$kvd);

  sort($rez);

  for ($i = 0; $i <= count($rez); $i++)
  {
    echo $rez[$i]." ";
  }


?>