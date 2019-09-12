<?php
class phpController {
  function phpPage($tekst){
    require '../private/models/extraModel.php';
    if($tekst == "wachtwoordA"){
      require '../private/includes/wachtwoord_aanpassen.php';
    } else if($tekst == "wachtwoordU"){
      require '../private/includes/wachtwoord_updaten.php';
    } else if($tekst == "emailA"){
      require '../private/includes/email_aanpassen.php';
    } else if($tekst == "emailU"){
      require '../private/includes/email_updaten.php';
    } else if($tekst == "berichtA"){
      require '../private/includes/agenda_berichten_uploaden.php';
    } else if($tekst == "berichtH"){
      require '../private/includes/nieuws_berichten_uploaden.php';
    } else{
      require '../private/views/404.php';
    }
  }

  function phpPageWithVariable($tekst,$variable){
    require '../private/models/extraModel.php';
    if($tekst == "verwijder"){
      require '../private/includes/verwijder.php';
    } else if($tekst == "admin"){
      require '../private/includes/admin.php';
    } else {
      require '../private/views/404.php';
    }
  }
}
?>
