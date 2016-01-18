<?php

use MoveElevator\XlsxAppender\Templates\XlsxRowTemplate;

/**
 * Class XlsxRowTemplateBench
 */
class XlsxRowTemplateBench {

	/**
	 * @Revs(1000)
	 */
	public function benchGetTemplateString() {
		XlsxRowTemplate::getTemplateString(
			array(1, "PHP", TRUE, 4, 5, "Bench", 7, FALSE, 9),
			'A',
			1
		);
	}
}
