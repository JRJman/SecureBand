<?php
  $gebruikersnaam = $_GET['gebruikersnaamL'];
  $wachtwoord = $_GET['wachtwoordL'];

  $con = dbConnect();
  $checker = logIn($con, $gebruikersnaam, $wachtwoord);

  if($checker[2] == true && $checker[3] == true){
    session_start();
    $_SESSION['id'] = $checker[4];
    $_SESSION['a'] = $checker[5];
    $_SESSION['ver'] = $checker[6];
    header("Location: http://www.jrjweb.nl/myband/public/");
  } else{
    if($checker[0] && $checker[1]) {
      $bL2 = false;
      $bL1 = true;
    }else if($checker[0] || $checker[1]){
      $bL2 = true;
    }

    if($checker[2] == false && $checker[3] == false){
      header("Location: http://www.jrjweb.nl/myband/public/log_in-registeren/fout/l3");
    } else if($checker[3] == false){
      header("Location: http://www.jrjweb.nl/myband/public/log_in-registeren/fout/l2");
    } else if($checker[2] == false){
      header("Location: http://www.jrjweb.nl/myband/public/log_in-registeren/fout/l1");
    }
  }
?>
