<?php

namespace Sts\XlsxAppender;

use Sts\XlsxAppender\Helper\XlsxArchiveHelper;
use Sts\XlsxAppender\Model\XlsxSheet;
use Sts\XlsxAppender\Templates\XlsxRowTemplate;

/**
 * Class Sts\XlsxAppender
 *
 * @package Sts
 */
class XlsxAppender {

	/**
	 * @var string
	 */
	protected $filePath;

	/**
	 * @var XlsxArchiveHelper
	 */
	protected $archiveHelper;

	/**
	 * XlsxAppender constructor.
	 *
	 * @param $filePath
	 */
	public function __construct($filePath) {
		$this->filePath = $filePath;
		$this->archiveHelper = new XlsxArchiveHelper();
		$this->archiveHelper->open($filePath);
	}

	/**
	 * @param string $sheetName
	 * @return XlsxSheet
	 * @throws \Exception
	 */
	public function getSheetPathBySheetName($sheetName) {
		/** @var XlsxSheet $sheet */
		foreach ($this->archiveHelper->getSheetsFromArchive() as $sheet) {
			if ($sheetName === $sheet->getName()) {
				return $sheet;
			}
		}

		throw new \Exception('no sheet found by given name', 1452511459);
	}

	/**
	 * @param XlsxSheet $sheet
	 * @param array $dataArray
	 * @param integer $startAtLine
	 * @param string $startAtRow
	 * @throws \Exception
	 */
	public function appendDataArrayToSheet($sheet, $dataArray, $startAtLine, $startAtRow = 'A') {
		$anchor = '</sheetData>';
		$oldContent = $this->archiveHelper->getFromName($sheet->getPath());

		$newContent = '';
		$writtenLines = $startAtLine;
		foreach ($dataArray as $data) {
			$newContent .= XlsxRowTemplate::getTemplateString($data, $startAtRow, $writtenLines);
			$writtenLines++;
		}
		$newContent .= $anchor;

		if (substr_count($oldContent, $anchor) !== 1) {
			throw new \Exception('could not find anchor', 1452522446);
		}

		$newFileData = str_replace($anchor, $newContent, $oldContent);
		$this->archiveHelper->deleteName($sheet->getPath());
		$this->archiveHelper->addFromString($sheet->getPath(), $newFileData);
	}

	/**
	 * @return void
	 */
	public function saveAndExit() {
		$this->archiveHelper->close();
	}
}
