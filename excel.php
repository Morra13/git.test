<?php
require($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$sFileJson = $_SERVER['DOCUMENT_ROOT'] . '/db/info.json';
$arrJsonGet = file_get_contents($sFileJson);
$arrJsonDecode = json_decode($arrJsonGet, true);
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

for ($i = 0; $i < count($arrJsonDecode); $i++) {
    $arrNum[] = $i;
}
if (isset($arrNum)) {
    foreach ($arrNum as $iValue) {
        $iColumn = $iValue + 2;
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue("A$iColumn", $arrJsonDecode["$iValue"]['name']);

        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue("B$iColumn", $arrJsonDecode["$iValue"]['email']);

        $sheet->setCellValue('C1', 'Phone');
        $sheet->setCellValue("C$iColumn", $arrJsonDecode["$iValue"]['phone']);

        $sheet->setCellValue('D1', 'Comment');
        $sheet->setCellValue("D$iColumn", $arrJsonDecode["$iValue"]['comment']);

        $sheet->setCellValue('E1', 'Avatar');
        $sheet->setCellValue("E$iColumn", $arrJsonDecode["$iValue"]['avatar']);
    }
}
$writer = new Xlsx($spreadsheet);
$writer->save('info1.xlsx');

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');