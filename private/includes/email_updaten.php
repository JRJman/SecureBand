<?php
  $email = $_POST['email'];
  $ver = $_POST['ver'];
  $boolean = false;
  $id = 0;
  $ver2 = code();

  $con = dbConnect();

  $boolean = emailUpdaten($con, $ver, $email, $ver2);

  if($boolean){
    header("Location: http://www.jrjweb.nl/myband/public/");
  } else {
    header("Location: http://www.jrjweb.nl/myband/public/aanpassen/email/" . $ver);
  }
?>
