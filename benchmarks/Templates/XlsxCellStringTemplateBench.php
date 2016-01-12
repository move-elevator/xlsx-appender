<?php

use Sts\XlsxAppender\Templates\XlsxCellTemplate;

/**
 * Class XlsxCellStringTemplateBench
 */
class XlsxCellStringTemplateBench {

	/**
	 * @var XlsxCellTemplate
	 */
	protected $cellTemplateObject;

	/**
	 * XlsxCellTemplateBench constructor.
	 */
	public function __construct() {
		$this->cellTemplateObject = new XlsxCellTemplate('A1', 'Test');
	}

	/**
	 * @Revs(100000)
	 */
	public function benchGetTemplateString() {
		$this->cellTemplateObject->getTemplateString();
	}
}
