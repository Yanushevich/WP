<title> Янушевич Максим ПИ-322</title>
<?php
  
  $a=round((rand(10,20)/rand(1,10)),1);
  $b=round((rand(10,20)/rand(1,10)),1);
  if ($a==$b){ 
    $b-=0.2;
  } 

  print ('a=' . $a . '<br> b=' . $b);

  function ut($u, $t) {
    $f=0;
    if ($u*$t<0.5) {
      $f=1+cos($t-$u)/($u/$t+$t*$t);
    }
    else { $f=sin(log(abs($u/$t))); }
    return $f;
  }

  print ('<p>z=' . round((pow(cos(ut($a,$b)), 3) + ut($a+$b,$a-$b)),3));

?>