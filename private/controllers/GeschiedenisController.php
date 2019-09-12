<?php

/**
 * Class EventController
 *
 * Deze handelt de logica van ALLE agenda functionaliteit af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class GeschiedenisController {

	function geschiedenisPage(){
		$page = "Geschiedenis";
        require '../private/models/pages.php';
        require '../private/views/header.php';
		require '../private/views/geschiedenis_page.php';
		require '../private/views/footer.php';
	}

}
