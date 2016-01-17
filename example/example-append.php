<?php

require_once __DIR__ . '/../vendor/autoload.php';

$data = array(array(500, 999502, 22448, '01234'), array(501, 999501, 22448, '01234'));

$xlsxAppender = new \Sts\XlsxAppender\XlsxAppender(__DIR__ . '/../tests/fixtures/test.xlsx');
$sheet = $xlsxAppender->getSheetPathBySheetName('sheet1');
$xlsxAppender->appendDataArrayToSheet($sheet, $data, 12);
$xlsxAppender->saveAndExit();
