<?php

namespace MoveElevator\XlsxAppender\Helper;

use MoveElevator\XlsxAppender\Model\XlsxSheet;
use MoveElevator\XlsxAppender\Model\XlsxSheetCollection;

/**
 * @package MoveElevator\XlsxAppender\Helper
 */
class XlsxArchiveHelper extends \ZipArchive
{

    // XML-Schema-Path
    const SCHEMA_OFFICE_DOCUMENT = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument';
    const SCHEMA_WORKSHEET = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet';

    // XLSX archive path to relationships
    const RELATIONSHIP_FILE = '_rels/.rels';

    /**
     * @var XlsxSheetCollection
     */
    protected $sheets;

    /**
     * @return XlsxSheetCollection
     */
    public function getSheets()
    {
        return $this->sheets;
    }

    public function __construct()
    {
        $this->sheets = new XlsxSheetCollection();
    }

    /**
     * @return XlsxSheetCollection
     */
    public function getSheetsFromArchive()
    {
        $relationshipFile = simplexml_load_string($this->getFromName(self::RELATIONSHIP_FILE));
        foreach ($relationshipFile->Relationship as $item) {
            if ((string)$item['Type'] === self::SCHEMA_OFFICE_DOCUMENT) {
                $this->getWorkbookData($item);
            }
        }

        return $this->getSheets();
    }

    /**
     * @param \SimpleXMLElement $relationship
     *
     * @return void
     */
    protected function getWorkbookData($relationship)
    {
        $workbookFile = simplexml_load_string($this->getFromName($relationship['Target']));
        foreach ($workbookFile->sheets->sheet as $sheet) {
            $this->readSheetData($sheet, $relationship['Target']);
        }
    }

    /**
     * @param \SimpleXMLElement $sheetData
     * @param string            $relationshipTarget
     *
     * @return void
     */
    protected function readSheetData($sheetData, $relationshipTarget)
    {
        $workbookDir = dirname($relationshipTarget) . '/';
        $attributeNamespace = $sheetData->attributes('r', true);

        $sheet = new XlsxSheet();
        $sheet->setName((string)$sheetData['name']);
        $sheet->setSheetId((int)$sheetData['sheetId']);

        $this->sheets->offsetSet((string)$attributeNamespace->id, $sheet);

        $workbookRelationsXml = simplexml_load_string(
            $this->getFromName($workbookDir . '_rels/' . basename($relationshipTarget) . '.rels')
        );

        foreach ($workbookRelationsXml->Relationship as $workbookRelationship) {
            if ((string)$workbookRelationship['Type'] !== self::SCHEMA_WORKSHEET) {
                continue;
            }
            $sheetId = (string)$workbookRelationship['Id'];
            /** @var XlsxSheet $sheet */
            $sheet = $this->sheets->offsetGet($sheetId);
            $sheet->setPath($workbookDir . (string)$workbookRelationship['Target']);
            $this->sheets->offsetSet($sheetId, $sheet);
        }
    }
}
