<?php

use MoveElevator\XlsxAppender\Model\XlsxSheetCollection;

/**
 * Class XlsxSheetCollectionTest
 */
class XlsxSheetCollectionTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var XlsxSheetCollection
	 */
	protected $fixture;

	/**
	 * setup
	 */
	public function setup() {
		$this->fixture = new XlsxSheetCollection();
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
	public function arrayObjectTest() {
		$index = 'index';
		$value = 'value';
		$this->fixture->offsetSet($index, $value);
		$this->assertEquals($value, $this->fixture->offsetGet($index));
	}
}
