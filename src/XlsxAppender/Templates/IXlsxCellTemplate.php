<?php

namespace MoveElevator\XlsxAppender\Templates;

/**
 * @package MoveElevator\XlsxAppender\Templates
 */
interface IXlsxCellTemplate
{
    /**
     * @param string $coordinate
     * @param mixed  $value
     *
     * @return string
     */
    static public function getCellCode($coordinate, $value);
}
