<?php

namespace Sts\XlsxAppender\Templates;

/**
 * Class XlsxCellTemplate
 *
 * @package Sts\XlsxAppender\Templates
 */
class XlsxCellTemplate {

	/**
	 * @var string
	 */
	protected $template;

	/**
	 * XlsxCellTemplate constructor.
	 *
	 * @param string $coordinate
	 * @param mixed $value
	 * @throws \InvalidArgumentException
	 */
	public function __construct($coordinate, $value) {
		switch (gettype($value)) {
			case 'boolean':
				$this->template = XlsxCellBooleanTemplate::getCellCode($coordinate, $value);
				break;
			case 'integer':
				$this->template = XlsxCellIntegerTemplate::getCellCode($coordinate, $value);
				break;
			case 'string':
			case 'NULL':
				$this->template = XlsxCellStringTemplate::getCellCode($coordinate, $value);
				break;
			default:
				throw new \InvalidArgumentException('not supported type of value', 1452518828);
		}
	}

	/**
	 * @return string|void
	 */
	public function getTemplateString() {
		return $this->template;
	}
}
