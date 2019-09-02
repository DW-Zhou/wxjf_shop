<?php
 
require_once 'Classes/PHPExcel.php';
 
/**对excel里的日期进行格式转化*/
function GetData($val)
{
    $jd = GregorianToJD(1, 1, 1970);
    $gregorian = JDToGregorian($jd   intval($val) - 25569);
    return $gregorian;
    /**显示格式为 “月/日/年” */
}
 
$filePath = 'report.xls';
 
$PHPExcel = new PHPExcel();
 
/**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
$PHPReader = new PHPExcel_Reader_Excel2007();
if (!$PHPReader->canRead($filePath)) {
    $PHPReader = new PHPExcel_Reader_Excel5();
    if (!$PHPReader->canRead($filePath)) {
        echo 'no Excel';
        return;
    }
}
 
$PHPExcel = $PHPReader->load($filePath);
/**读取excel文件中的第一个工作表*/
$currentSheet = $PHPExcel->getSheet(0);
/**取得最大的列号*/
$allColumn = $currentSheet->getHighestColumn();
/**取得一共有多少行*/
$allRow = $currentSheet->getHighestRow();
/**从第二行开始输出，因为excel表中第一行为列名*/
for ($currentRow = 2; $currentRow <= $allRow; $currentRow  ) {
    /**从第A列开始输出*/
    for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn  ) {
        $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, $currentRow)->getValue();
        /**ord()将字符转为十进制数*/
        if ($currentColumn < 'A') {
            echo GetData($val) . "\t";
        } else {
//echo $val; 
            /**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/
            echo iconv('utf-8', 'gb2312', $val) . "\t";
        }
    }
    echo "</br>";
}
echo "\n";
?>