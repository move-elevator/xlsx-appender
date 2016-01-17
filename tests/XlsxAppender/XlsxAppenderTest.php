<?php

use Sts\XlsxAppender\XlsxAppender;

/**
 * Class XlsxAppenderTest
 */
class XlsxAppenderTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var XlsxAppender
	 */
	protected $fixture;

	/**
	 * setup
	 */
	public function setup() {
		$this->fixture = new XlsxAppender(__DIR__ . '/../fixtures/test.xlsx');
	}

	/**
	 * tearDown
	 */
	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function testGetSheetPathBySheetName() {
		$sheet = $this->fixture->getSheetPathBySheetName('sheet1');
		$this->assertEquals('sheet1', $sheet->getName());
		$this->assertEquals('xl/worksheets/sheet1.xml', $sheet->getPath());
		$this->assertEquals(1, $sheet->getId());
	}

	/**
	 * @test
	 * @expectedException Exception
	 * @expectedExceptionMessage no sheet found by given name
	 */
	public function testGetSheetPathByInvalidSheetName() {
		$this->fixture->getSheetPathBySheetName('InvalidSheetTitle');
	}
}
