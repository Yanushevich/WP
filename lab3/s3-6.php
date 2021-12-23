<title> Янушевич Максим ПИ-322</title>
<?
$text1 = $_POST["text1"];
$text2 = $_POST["text2"];
$text3 = $_POST["text3"];
$sym1 = $_POST["sym1"];
$sym2 = $_POST["sym2"];
$let = $_POST["letter"];

$s1c = 0;
$s2c = 0;
$letc = 0;
$rev = "";
$t1 = array();
$t2 = array();
$t3 = array();

if (isset($_POST["text1"])) {

  echo '<h3> Вариант 13 </h3>';
  echo $text1;
  echo '<br>';
  $t1 = preg_split('//u', $text1, -1, PREG_SPLIT_NO_EMPTY);
  foreach ($t1 as $z) {
    if ($sym1 == $z) { $s1c++; }
    if ($sym2 == $z) { $s2c++; }
  }
  echo ('Символ "' . $sym1 . '" встречается ' . $s1c . ' раз <br>');
  echo ('Символ "' . $sym2 . '" встречается ' . $s2c . ' раз');

  echo '<h3> Вариант 3 </h3>';
  echo $text2;
  echo '<br>';
  $t2 = explode (' ', $text2);
  foreach ($t2 as $str) {
    if (mb_substr($str, 0, 1,"utf-8") == $let) { $letc++; }
  }
  echo ('Число слов, начинающихся на букву ' . $let . ': ' . $letc . '<br>');

  echo '<h3> Вариант 16 </h3>';
  echo $text3;
  echo '<br>';
  $t3 = explode (' ', $text3);
  $rev = array_reverse($t3);
  echo ('Строка с обратным порядком слов: ');
  foreach ($rev as $z1) {
    echo ($z1 . ' ');
  }

}

?>