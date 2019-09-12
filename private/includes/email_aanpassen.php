<?php
  $wachtwoord = $_POST['wachtwoord'];

  $con = dbConnect();
  $ver = emailAanpassen($con, $wachtwoord);

  if($ver == ""){
    header("Location: http://www.jrjweb.nl/myband/public/aanpassen/email");
  } else {
    header("Location: http://www.jrjweb.nl/myband/public/aanpassen/email/" . $ver);
  }
?>
