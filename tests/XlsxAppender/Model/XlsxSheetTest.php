<?php

use \Sts\XlsxAppender\Model\XlsxSheet;

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
	public function setAndGetIdTest() {
		$id = '123';
		$this->fixture->setId($id);
		$this->assertEquals($id, $this->fixture->getId());
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
