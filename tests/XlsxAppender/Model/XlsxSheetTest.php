<?php

use MoveElevator\XlsxAppender\Model\XlsxSheet;

/**
 * Class XlsxSheetTest
 */
class XlsxSheetTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var XlsxSheet
	 */
	protected $fixture;

	/**
	 * setup
	 */
	public function setup() {
		$this->fixture = new XlsxSheet();
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
	public function setAndGetNameTest() {
		$name = 'SheetTitle';
		$this->fixture->setName($name);
		$this->assertEquals($name, $this->fixture->getName());
	}

	/**
	 * @test
	 */
	public function setAndGetSheetIdTest() {
		$id = '123';
		$this->fixture->setSheetId($id);
		$this->assertEquals($id, $this->fixture->getSheetId());
	}

	/**
	 * @test
	 */
	public function setAndGetPathTest() {
		$path = '/test/path';
		$this->fixture->setPath($path);
		$this->assertEquals($path, $this->fixture->getPath());
	}

}
