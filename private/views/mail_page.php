<?php
  if($tekst == "activatie"){
    echo "<p>U kunt nu inloggen op u account</p>";
    $con = dbConnect();
    activated($con,$gebruikersnaam);
  }else if($tekst == "registeren"){
    echo "<p>Er is een link naar je email adress gestuurd om je account te activeren</p>";
  }else if($tekst == "aanpassen"){
    echo "<p>Er is een link naar je email adress gestuurd om je wachtwoord aan te passen</p>";
  }else if($tekst == "fout"){
    echo "<p>Er is iets fout gegaan met het versturen van de email</p>";
  }
?>
