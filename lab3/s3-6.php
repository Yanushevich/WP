<title> Янушевич Максим ПИ-322</title>
<meta charset="utf-8">
<?
if (isset($_POST["f1"])) {
  $text1 = $_POST["text1"];
  $t1 = array();
  $let = iconv("utf-8", "cp1251", $_POST["letter"]);
  $letc = 0;
  echo '<h3> Вариант 3 </h3>';
  echo $text1;
  $text1 = iconv("utf-8", "cp1251", $text1);
  echo '<br>';
  $t1 = explode (' ', $text1);
  foreach ($t1 as $str) {
    if (substr($str, 0, 1) == $let) { $letc++; }
  }
  $let = iconv("cp1251", "utf-8", $let);
  echo ('Число слов, начинающихся на букву ' . $let . ': ' . $letc . '<br>');
}

if (isset($_POST["f2"])) {
  $text2 = $_POST["text2"];
  $t2 = array();
  $count = (int)$_POST["count"];
  echo '<h3> Вариант 7 </h3>';
  echo $text2;
  echo '<br> Слова, имеющие число букв ' . $count . ': <br>';
  $t2 = explode(' ', $text2);

  foreach ($t2 as $str) {
    if (iconv_strlen($str) == $count) { echo ($str . '<br>');}
  }
} 

if (isset($_POST["f3"])) {
  $text3 = $_POST["text3"];
  $let1 = iconv("utf-8", "cp1251", $_POST["let1"]);
  $let2 = iconv("utf-8", "cp1251", $_POST["let2"]);
  $t3 = array();
  echo '<h3> Вариант 11 </h3>';
  echo $text3;
  $text3 = iconv("utf-8", "cp1251", $text3);
  echo '<br>';
  $t3 = str_split($text3);
  foreach ($t3 as $i => $v) {
    if (substr($t3[$i], 0, 1) == $let1) {
      if(substr($t3[$i+1], 0, 1) == $let2) {
	unset($t3[$i]);
      }
    }
  }
  echo ('Обработанный текст: ');
  for ($i = 0; $i < count($t3); $i++) {
    echo iconv("cp1251", "utf-8", $t3[$i]);
  }

}

if (isset($_POST["f4"])) {
$string=iconv("utf-8","cp1251",$_POST['text4']);
$upper=$lower=0;
foreach(preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY) as $c){
if($c==mb_strtoupper($c, 'utf-8')){
++$upper;
}else{
++$lower;
}
}

if ($upper>$lower){
$string=mb_strtoupper($string, 'utf-8');
//$string= mb_convert_case($string, MB_CASE_UPPER);
echo iconv("cp1251", "utf-8", $string);
}
elseif ($upper<$lower)
{
$string=mb_strtolower($string, 'utf-8');
//$string= mb_convert_case($string, MB_CASE_LOWER);
echo iconv("cp1251", "utf-8", $string);
}
elseif ($upper==$lower)
echo iconv("cp1251", "utf-8", $string);
}

?>