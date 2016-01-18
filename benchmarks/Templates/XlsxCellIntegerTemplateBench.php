<?php

use MoveElevator\XlsxAppender\Templates\XlsxCellTemplate;

/**
 * Class XlsxCellIntegerTemplateBench
 */
class XlsxCellIntegerTemplateBench {

	/**
	 * @var XlsxCellTemplate
	 */
	protected $cellTemplateObject;

	/**
	 * XlsxCellTemplateBench constructor.
	 */
	public function __construct() {
		$this->cellTemplateObject = new XlsxCellTemplate('A1', 1);
	}

	/**
	 * @Revs(100000)
	 */
	public function benchGetTemplateString() {
		$this->cellTemplateObject->getTemplateString();
	}
}
