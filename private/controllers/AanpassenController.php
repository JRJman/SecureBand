<?php

/**
 * Class PageController
 *
 * Deze handelt de logica van alle algemene pagina;s af (over ons, wie zijn we etc,)
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class AanpassenController {

	function AanpassenPage($tekst){
		if($tekst == "email"){
			$page = "email_aanpassen";
		} else if($tekst == "wachtwoord" || $tekst == "wachtwoordF"){
			$page = "wachtwoord_aanpassen";
		}
        require '../private/models/aanpassenModel.php';
        require '../private/views/header.php';

		if($tekst == "email"){
            require '../private/views/aanpassen_email_page.php';
	  }else if($tekst == "wachtwoord" || $tekst == "wachtwoordF"){
			$b = true;
			if($tekst == "wachtwoordF"){
				$b = false;
			}
			require '../private/views/aanpassen_wachtwoord_page.php';
	  }

		require '../private/views/footer.php';
	}
}
