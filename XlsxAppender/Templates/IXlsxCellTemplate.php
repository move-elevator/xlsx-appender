<?php

namespace Sts\XlsxAppender\Templates;

/**
 * Interface IXlsxCellTemplate
 *
 * @package Sts\XlsxAppender\Templates
 */
interface IXlsxCellTemplate {
	/**
	 * @param string $coordinate
	 * @param mixed $value
	 * @return string
	 */
	static public function getCellCode($coordinate, $value);
}
