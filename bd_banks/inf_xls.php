<?require_once('PHPExcel/Classes/PHPExcel.php');require_once('PHPExcel/Classes/PHPExcel/Writer/Excel5.php');$xls = new PHPExcel();$xls->setActiveSheetIndex(0);$sheet = $xls->getActiveSheet();$conn=mysqli_connect("eu-cdbr-west-02.cleardb.net", "b94b976f849e9f", "f60a7bfb") or die ("Невозможноподключиться к серверу"); // установление соединения с сервером // подключение к базе данных: mysqli_query($conn,'SET NAMES cp1251'); // тип кодировки mysqli_select_db($conn,"heroku_60a6c74570f65ce") or die("Нет такой таблицы!");$sheet->setTitle('Машины в наличии');$sheet->getColumnDimension('E')->setWidth(15);$sheet->getColumnDimension('D')->setWidth(8);$sheet->getColumnDimension('G')->setWidth(15);$sheet->getColumnDimension('H')->setWidth(15);$zagolovok =array("Номер", "Наименование банка","Страна", "Класс надежности", "Название программы", "% годовых", "Сумма всех вкладов такого типа");for($i = 0; $i < count($zagolovok); $i++)$sheet->setCellValueByColumnAndRow($i, 1, $zagolovok[$i]);$result = mysqli_query($conn, "SELECT banks.name as 'bank', banks.country as 'country', banks.class as 'class', deposit.name as 'dep', deposit.perc as 'perc', (SELECT SUM(vklad.start) FROM vklad WHERE (deposit.id_dep=vklad.id_dep)) as 'summa' FROM banks LEFT JOIN deposit ON (banks.id_bank=deposit.id_bank) LEFT JOIN vklad ON (vklad.id_dep=deposit.id_dep)");$i=2;$j=1;while($row = mysqli_fetch_array($result)){$sheet->setCellValueByColumnAndRow(0,$i,$j);$sheet->setCellValueByColumnAndRow(1,$i,iconv("cp1251", "utf-8", $row['bank']));$sheet->setCellValueByColumnAndRow(2,$i,iconv("cp1251", "utf-8", $row['country']));$sheet->setCellValueByColumnAndRow(3,$i,iconv("cp1251", "utf-8", $row['class']));$sheet->setCellValueByColumnAndRow(4,$i,iconv("cp1251", "utf-8", $row['dep']));$sheet->setCellValueByColumnAndRow(5,$i,iconv("cp1251", "utf-8", $row['perc']));$sheet->setCellValueByColumnAndRow(6,$i,iconv("cp1251", "utf-8", $row['summa']));$i++;$j++;}header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );header ( "Cache-Control: no-cache, must-revalidate" );header ( "Pragma: no-cache" );header ( "Content-type: application/vnd.ms-excel" );header ( "Content-Disposition: attachment; filename=inf.xls" );// Выводим содержимое файла$objWriter = new PHPExcel_Writer_Excel5($xls);$objWriter->save('php://output');?>