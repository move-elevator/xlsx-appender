<?php

use Sts\XlsxAppender\Templates\XlsxCellTemplate;

/**
 * Class XlsxCellBooleanTemplateBench
 */
class XlsxCellBooleanTemplateBench {

	/**
	 * @var XlsxCellTemplate
	 */
	protected $cellTemplateObject;

	/**
	 * XlsxCellTemplateBench constructor.
	 */
	public function __construct() {
		$this->cellTemplateObject = new XlsxCellTemplate('A1', TRUE);
	}

	/**
	 * @Revs(100000)
	 */
	public function benchGetTemplateString() {
		$this->cellTemplateObject->getTemplateString();
	}
}
