<?php

namespace MoveElevator\XlsxAppender\Model;

/**
 * @package MoveElevator\XlsxAppender\Model
 */
class XlsxSheet
{

    /**
     * @var integer
     */
    protected $sheetId;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $path;

    /**
     * @return int
     */
    public function getSheetId()
    {
        return $this->sheetId;
    }

    /**
     * @param int $sheetId
     */
    public function setSheetId($sheetId)
    {
        $this->sheetId = $sheetId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

}
