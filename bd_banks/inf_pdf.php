<? session_start(); include("check_log.php");
require_once('tcpdf/tcpdf.php');
function fetch_data()
{
$conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможно
подключиться к серверу"); // установление соединения с сервером
 // подключение к базе данных:
 mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки
 mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die("Нет такой таблицы!");
$output .= '';
$result = mysqli_query($conn, "SELECT banks.name as 'bank', banks.country as 'country', banks.class as 'class', deposit.name as 'dep', deposit.perc as 'perc', (SELECT SUM(vklad.start) FROM vklad WHERE (deposit.id_dep=vklad.id_dep)) as 'summa' FROM banks LEFT JOIN deposit ON (banks.id_bank=deposit.id_bank) LEFT JOIN vklad ON (vklad.id_dep=deposit.id_dep)");
$i=1;
while($row = mysqli_fetch_array($result)) {
$output .= '<tr>
<td>'.$i.'</td>
<td>'.iconv("cp1251", "utf-8", $row['bank']).'</td>
<td>'.iconv("cp1251", "utf-8", $row['country']).'</td>
<td>'.iconv("cp1251", "utf-8", $row['class']).'</td>
<td>'.iconv("cp1251", "utf-8", $row['dep']).'</td>
<td>'.iconv("cp1251", "utf-8", $row['perc']).'</td>
<td>'.iconv("cp1251", "utf-8", $row['summa']).'</td>
</tr>';
$i++;
}
return $output;
}

$obj_pdf = new tcpdf('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);
$obj_pdf-> SetTitle("Вклады");
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('dejavusans');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->setFontSubsetting(true);
$obj_pdf->SetFont('dejavusans', '', 12);
$obj_pdf->AddPage();
$content .= '';
$content .= '

<h3 align="center">Вклады</h3><br /><br />

<table border="1" cellspacing="0" cellpadding="5">

<tr>

<th>№</th>

<th>Наименование банка</th>
<th>Страна</th>
<th>Класс надежности</th>
<th>Название программы</th>
<th>% годовых</th>
<th>Сумма всех вкладов такого типа</th>
</tr>

';

$content .= fetch_data();

$content .= '</table>';

$obj_pdf->writeHTML($content, true, false, false, false, '');

$obj_pdf->Output('inf.pdf', 'I');

?>