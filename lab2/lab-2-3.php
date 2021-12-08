<title> Янушевич Максим ПИ-322</title>
<?php
  
  $arr=array("cnum" => 2001,
	     "cname" => "Hoffman",
	     "city" => "London",
	     "snum" => 1001);

  $arr["rating"] = 100;

  sort($arr);

  foreach($arr as $key => $value)
  {
     echo "$key = $value <br />";
  }


?>