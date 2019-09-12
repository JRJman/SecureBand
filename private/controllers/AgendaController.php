<?php

/**
 * Class FacilitiesController
 *
 * Deze handelt de logica van de alle te vrhuren huisje sop de camping af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class AgendaController {

	function agendaPage(){
		$page = "Agenda";
		require '../private/views/header.php';
		require '../private/views/agenda_page.php';
		require '../private/views/footer.php';
	}

	function showBericht($id){
		$page = "Bericht";
        require '../private/models/agendaModel.php';
        require '../private/views/header.php';
		require '../private/views/agenda_berichten_page.php';
		require '../private/views/footer.php';
	}

}
