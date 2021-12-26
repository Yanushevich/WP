<title> Янушевич Максим ПИ-322</title>
<meta charset="utf-8">
<?
if (isset($_POST["f1"])) {
  $text1 = $_POST["text1"];
  $t1 = array();
  $let = $_POST["letter"];
  $letc = 0;
  echo '<h3> Вариант 3 </h3>';
  echo $text1;
  echo '<br>';
  $t1 = explode (' ', $text1);
  foreach ($t1 as $str) {
    if (mb_substr($str, 0, 1,"utf-8") == $let) { $letc++; }
  }
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
    if (iconv_strlen($str, "utf-8") == $count) { echo ($str . '<br>');}
  }
} 

if (isset($_POST["f3"])) {
  $text3 = $_POST["text3"];
  $let1 = $_POST["let1"];
  $let2 = $_POST["let2"];
  $t3 = array();
  echo '<h3> Вариант 11 </h3>';
  echo $text3;
  echo '<br>';
  $t3 = preg_split('//u', $text3, -1, PREG_SPLIT_NO_EMPTY);
  foreach ($t3 as $i => $v) {
    if (mb_substr($t3[$i], 0, 1,"utf-8") == $let1) {
      if(mb_substr($t3[$i+1], 0, 1,"utf-8") == $let2) {
	unset($t3[$i]);
      }
    }
  }
  echo ('Обработанный текст: ');
  for ($i = 0; $i < count($t3); $i++) {
    echo $t3[$i];
  }

}

?>