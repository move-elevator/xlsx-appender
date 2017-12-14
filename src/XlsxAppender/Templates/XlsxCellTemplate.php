<?php

namespace MoveElevator\XlsxAppender\Templates;

/**
 * @package MoveElevator\XlsxAppender\Templates
 */
class XlsxCellTemplate
{

    /**
     * @var string
     */
    protected $template;

    /**
     * @param string $coordinate
     * @param mixed  $value
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($coordinate, $value)
    {
        switch (gettype($value)) {
            case 'boolean':
                $this->template = XlsxCellBooleanTemplate::getCellCode($coordinate, $value);
                break;
            case 'integer':
                $this->template = XlsxCellIntegerTemplate::getCellCode($coordinate, $value);
                break;
            default:
            case 'string':
            case 'NULL':
                $this->template = XlsxCellStringTemplate::getCellCode($coordinate, $value);
                break;
        }
    }

    /**
     * @return string
     */
    public function getTemplateString()
    {
        return $this->template;
    }
}
