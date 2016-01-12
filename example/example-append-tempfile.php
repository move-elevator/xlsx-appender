<?php

require_once __DIR__ . '/../vendor/autoload.php';

$data = array(array(500, 999502, 22448, '01234'), array(501, 999501, 22448, '01234'));
$tempFile = __DIR__ . '/tempFile';

$startAtLine = 14;
$newContent = '';
foreach ($data as $item) {
	$newContent .= \Sts\XlsxAppender\Templates\XlsxRowTemplate::getTemplateString($item, 'A', $startAtLine);
	$startAtLine++;
}

file_put_contents($tempFile, $newContent, FILE_APPEND);

$xlsxAppender = new \Sts\XlsxAppender\XlsxAppender(__DIR__ . '/test.xlsx');
$sheet = $xlsxAppender->getSheetPathBySheetName('sheet1');
$xlsxAppender->appendTempFileToSheet($tempFile, $sheet);
$xlsxAppender->saveAndExit();
