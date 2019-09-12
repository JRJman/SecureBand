<?php
  $email = $_POST['email'];

  $con = dbConnect();

  $b = wachtwoordAanpassen1($con, $email);

  if($b == "false"){
    header("Location: http://www.jrjweb.nl/myband/public/aanpassen/wachtwoordF");
  } else {
    $ver = wachtwoordAanpassen2($con, $email);

    $onderwerp = "Wachtwoord aanpassen";
    $link = "http://localhost/test/public/aanpassen/wachtwoord/" . $ver;
    $msg = "klik op de link om een nieuw wachtwoord te maken " . $link;

    $result = mail($email, $onderwerp, $msg);

    if(!$result){
      header("Location: http://www.jrjweb.nl/myband/public/mail/fout/gegaan");
    }else{
      header("Location: http://www.jrjweb.nl/myband/public/mail/aanpassen/gelukt");
    }
  }
?>
