<?php

namespace Sts\XlsxAppender\Templates;

/**
 * Class XlsxRowTemplate
 *
 * @package Sts\XlsxAppender\Templates
 */
class XlsxRowTemplate {

	/**
	 * @param array $data
	 * @param string $startAtRow
	 * @param integer $line
	 * @return string
	 */
	static public function getTemplateString($data, $startAtRow, $line) {
		$rows = range('A', 'Z');
		$newContent = '<row r="' . $line . '" spans="1:' . count($data) . '">';
		$letterIndex = (int)array_search($startAtRow, $rows);

		foreach ($data as $item) {
			$coordinate = $rows[$letterIndex] . $line;
			$template = new XlsxCellTemplate($coordinate, $item);
			$newContent .= $template->getTemplateString();
			$letterIndex++;
		}

		$newContent .= '</row>';

		return $newContent;
	}
}
