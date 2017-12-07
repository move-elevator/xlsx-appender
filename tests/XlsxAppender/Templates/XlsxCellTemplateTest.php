<?php

use MoveElevator\XlsxAppender\Templates\XlsxCellTemplate;

/**
 * Class XlsxCellTemplateTest
 */
class XlsxCellTemplateTest extends PHPUnit_Framework_TestCase {

	/**
	 * @test
	 */
	public function testInlineStringTemplate() {
		$value = 'testString';
		$templateClass = new XlsxCellTemplate('A1', $value);
		$this->assertContains('t="inlineStr"', $templateClass->getTemplateString());
		$this->assertContains($value, $templateClass->getTemplateString());
	}

	/**
	 * @test
	 */
	public function testBooleanTemplate() {
		$value = TRUE;
		$templateClass = new XlsxCellTemplate('A1', $value);
		$this->assertContains('t="b"', $templateClass->getTemplateString());
		$this->assertContains('' . $value, $templateClass->getTemplateString());
	}

	/**
	 * @test
	 */
	public function testIntegerTemplate() {
		$value = 123;
		$templateClass = new XlsxCellTemplate('A1', $value);
		$this->assertContains((string)$value, $templateClass->getTemplateString());
	}

	/**
	 * @test
	 */
	public function testException() {
		$value = 123.00;
		$templateClass = new XlsxCellTemplate('A1', $value);
		$this->assertContains('t="inlineStr"', $templateClass->getTemplateString());
		$this->assertContains((string)$value, $templateClass->getTemplateString());
	}
}
