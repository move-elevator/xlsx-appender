<?php

namespace MoveElevator\XlsxAppender\Templates;

/**
 * @package MoveElevator\XlsxAppender\Templates
 */
class XlsxCellStringTemplate implements IXlsxCellTemplate
{

    /**
     * @param string $coordinate
     * @param mixed  $value
     *
     * @return string
     */
    static public function getCellCode($coordinate, $value)
    {
        $code = '<c r="' . $coordinate . '" t="inlineStr">';
        $code .= '<is><t>' . htmlspecialchars($value, ENT_QUOTES) . '</t></is>';
        $code .= '</c>';

        return $code;
    }
}
