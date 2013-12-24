<?php

// defining errors and their corresponding messages. 

class AlertBuilder {
    const ERROR = 0;
	const SUCCESS = 1;
	const INFO = 2;
	const WARNING = 3;

	public static function buildAlert($message, $alertType) {
		$html = '<div class="alert alert-dismissable ';

		// 'WARNING' isn't defined in the switch because it only needs CSS class 'alert'
		switch($alertType) {
			case AlertBuilder::ERROR:
				$html .= "alert-danger";
				break;
			case AlertBuilder::SUCCESS:
				$html .= "alert-success";
				break;
			case AlertBuilder::INFO:
				$html .= "alert-info";
				break;
			default:
				$html .= "alert-warning";
		}

		$html .= '">';
		$html .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		$html .= $message;
		$html .= '</div>';

		return $html;
	}
}

?>