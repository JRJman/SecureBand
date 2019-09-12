<?php
/**
 * Dit is de Front controller
 * ALLE requests die naar de webserver worden gedaan worden via de .htaccess naar dit script gestuurd.
 * Zo voorkom je dat je heel veel PHP bestanden hebt met dubbele code en logica.
 *
 * Alle urls hebben de volgende structuur: http://localhost/<controller>/<actie>/<optionele parameters>
 *
 * Bijv: http://localhost/page/show/about-us
 * (roept de show functie aan in de page controller met de parameter 'about-us')
 *
 * controller: page
 * actie: show
 * parameter: about-us
 *
 * De Front Controller (dit bestand) doorloopt elke keer de volgende procedure:
 *
 * 1. Inspecteert de URL die wordt opgevraagd
 * 2. Zoekt op in een "routing" tabel of hij deze URL of dit URL patroon kent
 * 3. Zo niet, dan is het een 404 oagina, want de website kent deze url niet
 * 4. Als de url wel wordt herkend en er een "route" is naar de juiste code dan:
 *  A. Wordt de juiste controller actie aangeroepen
 *  B. De controller krijgt alle gegevens door (de url, $_GET, $_POST, $_FILES etc)
 *  C. De controller haalt eventueel gegevens op via de Model laag (database queries e.d.)
 *  D. De controller geeft de gegevens aan de juiste view
 *  E. De view toont de gegevens op de juiste manier (met behulp van een foreach, if, switch e.d.)
 *  F. De complete view (met data) wordt door de controller teruggestuurd naar de gebruiker (dit is de Response)
 *
 */

/**
 * Download de kant en klare "router" van de AltoRouter website en zet het bestand AltoRouter.php in je private includes map
 * https://github.com/dannyvankooten/AltoRouter/zipball/master
 *
 * Lees vooral de documentatie op http://altorouter.com/
 *
 */
require '../private/includes/AltoRouter.php';

/**
 * Verder willen we nog wat andere zaken instellen en goed zetten
 * Dit staat in het bestand private/includes/init.php
 */
$CONFIG = require '../private/includes/config.php';
require '../private/includes/init.php';

require '../private/includes/functions.php';
require '../private/models/model.php';

$router = new AltoRouter();

//Als jouw public folder niet te zien is als je naar http://localhoist gaat stel dan het juiste basePath in (pas dit pad aan naar jouw situatie)
$router->setBasePath('/myband/public');

/**
 * Hier stellen we de juiste "routes" in voor onze website
 * We vertellen de router welke url naar welk stukje code (de controller) moet worden doorgestuuurd.
 */

$router->map( 'GET', '/', 'HomeController#homePage', 'home' );

$router->map( 'GET', '/geschiedenis', 'GeschiedenisController#geschiedenisPage', 'geschiedenis' );

$router->map( 'GET', '/spelregels', 'SpelregelsController#SpelregelsPage', 'spelregels' );

$router->map( 'GET', '/agenda', 'AgendaController#agendaPage', 'agenda' );
$router->map( 'GET', '/agenda/bericht/[i:id]', 'AgendaController#showBericht', 'agendaBerichten' );

$router->map( 'GET', '/log_in-registeren', 'Log_inController#Log_inPage', 'log_in/registeren' );
$router->map( 'GET', '/log_in-registeren/fout/[a:boolean]', 'Log_inController#Log_inPageWrong1', 'log_in/registeren_fout' );

$router->map( 'GET', '/mail/[a:tekst]/[a:gebruikersnaam]', 'MailController#mailPage', 'mails' );

$router->map( 'GET', '/aanpassen/[a:tekst]', 'AanpassenController#AanpassenPage', 'aanpassen' );
$router->map( 'GET', '/aanpassen/email/[a:tekst]', 'AanpassenEmailController#AanpassenEmailPage', 'aanpassen_email' );
$router->map( 'GET', '/aanpassen/wachtwoord/[a:tekst]', 'AanpassenWachtwoordController#AanpassenWachtwoordPage', 'aanpassen_wachtwoord' );

$router->map( 'POST', '/php/[a:tekst]', 'phpController#phpPage', 'extra_php' );
$router->map( 'GET', '/php/[a:tekst]/[a:variable]', 'phpController#phpPageWithVariable', 'extra_php_with_variable)' );

$router->map( 'GET', '/contactformulier', 'ContactformulierController#contactformulierPage', 'contactformulier' );

$router->map( 'GET', '/uitloggen', 'UitloggenController#UitloggenPage', 'uitloggen' );

$router->map( 'GET', '/profiel', 'ProfielController#profielPage', 'profiel' );

$router->map( 'GET', '/admin', 'AdminController#adminPage', 'admin' );

// Daarna vragen we $router of de huidige URL getmatcht kan worden.
$match = $router->match();
/**
 * Als er een "match" is dan roepen we de controller en de juiste method aan die we zelf hebben ingesteld
 * Je krijgt namelijk alle info terug in de $match variabele die je nodig hebt om de juiste code aan te roepen
 * Lees in de documentatie hoe je dit allemaal kunt doen met AltoRouter
 */
if ( is_array( $match ) && is_callable( $match['target'] ) ) {
	//Als het een inline function is roepen we deze meteen aan
	call_user_func_array( $match['target'], $match['params'] );

} else if ( $match !== false ) {
	//Anders hakken we de controller#method doormidden op het "#" teken en zetten we ze in twee variabelen
	list( $controller_name, $method ) = explode( '#', $match['target'] );

	try {
		// We maken een nieuwe "instance" aan van de juiste controller class
		$controller = new $controller_name;

		// We roepen we juiste method aan in de controller class
		call_user_func_array( [ $controller, $method ], $match['params'] );

	} catch ( \Exception $e ) {
		echo $e->getMessage();
		exit;
	}
} else {
	// Er is geen match dus een 404 pagina
	$page = "404";
	require '../private/views/header.php';
	require '../private/views/404.php';
	require '../private/views/footer.php';
}
