<?php
    require '../private/models/headerModel.php';
  session_start();
  $header = false;
  $admin = false;
  if(!empty($_SESSION['a'])){
    if($_SESSION['a'] == "true"){
      $admin = true;
    }
  }
  if(!empty($_SESSION['id'])){
    if(!empty($_SESSION['ver'])){
      $con = dbConnect();
      $header = boolean($con,$_SESSION['id'],$_SESSION['ver']);
    }
  }
?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <title><?php echo $page;?></title>
    <link rel="stylesheet" href="http://www.jrjweb.nl/myband/public/css/header.css">
    <link rel="stylesheet" href="http://www.jrjweb.nl/myband/public/css/<?php echo $page; ?>.css">
    <link rel="stylesheet" href="http://www.jrjweb.nl/myband/public/css/footer.css">
  </head>
  <body>
    <div id="header">
      <img id="logo" src="http://www.jrjweb.nl/myband/public/images/logo.jpg" alt="logo">
      <h1 id="h1">badminton</h1>
      <input type="checkbox" id="menuButton">
      <label for="menuButton" id="labelMenuButton"></label>
      <nav>
        <ul>
          <label for="menuButton" id="labelMenuButton2"></label>
          <li id="home"><a href="http://www.jrjweb.nl/myband/public/">Home</a></li>
          <li id="geschiedenis"><a href="http://www.jrjweb.nl/myband/public/geschiedenis">Geschiedenis</a></li>
          <li id="spelregels"><a href="http://www.jrjweb.nl/myband/public/spelregels">Spelregels</a></li>
          <li id="contactformulier"><a href="http://www.jrjweb.nl/myband/public/contactformulier">Contactformulier</a></li>
          <li id="agenda"><a href="http://www.jrjweb.nl/myband/public/agenda">Agenda</a></li>
          <?php
            if($header == true){
              echo "<li id='log_out'><a href='http://www.jrjweb.nl/myband/public/uitloggen'>Uitloggen</a></li>";
              echo "<li id='profiel'><a href='http://www.jrjweb.nl/myband/public/profiel'>Profiel</a></li>";
            } else {
              echo "<li id='log_in'><a href='http://www.jrjweb.nl/myband/public/log_in-registeren'>Log in/Registeren</a></li>";
            }
            if($admin == true){
              echo '<li id="admin"><a href="http://www.jrjweb.nl/myband/public/admin">Admin</a></li>';
            }
          ?>
        </ul>
      </nav>
    </div>
