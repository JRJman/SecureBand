<?php

/**
 * Class PageController
 *
 * Deze handelt de logica van alle algemene pagina;s af (over ons, wie zijn we etc,)
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class Log_inController {

	function Log_inPage(){
		$page = "Log_in_Registeren";
		$log_in = "";
        require '../private/models/log_in_registerenModel.php';
        require '../private/views/header.php';
		require '../private/views/log_in_registeren.php';
		require '../private/views/footer.php';
	}

	function Log_inPageWrong1($boolean){
		$page = "Log_in_Registeren";
		$log_in = $boolean;
        require '../private/models/log_in_registerenModel.php';
        require '../private/views/header.php';
		require '../private/views/log_in_registeren.php';
		require '../private/views/footer.php';
	}

}
