<?php

namespace MoveElevator\XlsxAppender\Templates;

/**
 * @package MoveElevator\XlsxAppender\Templates
 */
class XlsxCellBooleanTemplate implements IXlsxCellTemplate
{

    /**
     * @param string $coordinate
     * @param mixed  $value
     *
     * @return string
     */
    static public function getCellCode($coordinate, $value)
    {
        $code = '<c r="' . $coordinate . '" t="b">';
        $code .= '<v>' . $value . '</v>';
        $code .= '</c>';

        return $code;
    }
}
