<?php
  $wachtwoord1 = $_POST['wachtwoord1'];
  $wachtwoord2 = $_POST['wachtwoord2'];
  $ver = $_POST['ver'];
  $boolean = true;

  if($wachtwoord1 === $wachtwoord2){
    $hash = password_hash($wachtwoord1, PASSWORD_BCRYPT);
    $ver2 = code();
    $con = dbConnect();
    wachtwoordUpdaten($con,$ver, $ver2,$hash);
  } else {
    $boolean = false;
  }

  if($boolean){
    header("Location: http://www.jrjweb.nl/myband/public/");
  } else {
    header("Location: http://www.jrjweb.nl/myband/public/aanpassen/wachtwoord/" . $ver);
  }
?>
