<?php

/**
 * Class PageController
 *
 * Deze handelt de logica van alle algemene pagina;s af (over ons, wie zijn we etc,)
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class AdminController {

	function adminPage(){
		$page = "Admin";
        require '../private/models/adminModel.php';
        require '../private/views/header.php';
		require '../private/views/admin_page.php';
		require '../private/views/footer.php';
	}

}
