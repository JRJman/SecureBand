<?php
  $naam = $_POST['naam'];
  $email = $_POST['email'];
  $onderwerp = $_POST['onderwerp'];
  $bericht = $_POST['bericht'];

  $email2 = "joep.dragon13@gmail.com";

  $msg = "My name is ". $naam . "\nMijn email is " . $email . "\nEn mijn bericht is\n" . $bericht;

  $result = mail($email2, $onderwerp, $msg);

  if(!$result){
       echo 'Er ging iets fout bij het versturen van de verificatie e-mail';
       header("Location: http://www.jrjweb.nl/myband/public/contactformulier");
    }else{
      header("Location: http://www.jrjweb.nl/myband/public/contactformulier");
    }
?>
