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
  unset($rez[0]);
  for ($i = 0; $i <= count($rez); $i++)
  {
    echo $rez[$i]." ";
  }

  print ("<br>");
  print ('$rez1=');
  $rez1=array();
  $rez1=array_unique($rez);
  for ($i = 0; $i <= count($rez1)+1; $i++)
  {
    echo $rez1[$i]." ";
  }

?>