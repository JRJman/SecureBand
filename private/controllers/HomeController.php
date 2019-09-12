<?php

/**
 * Class HomeController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class HomeController {

	function homePage(){
		$page = "Home";
		include '../private/views/header.php';
		include '../private/views/home_page.php';
		include '../private/views/footer.php';
	}

}
