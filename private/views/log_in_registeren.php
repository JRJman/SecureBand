<?php
  $booleanG = true;
  $booleanH = true;
  $booleanE = true;
  $booleanL1 = true;
  $booleanL2 = true;
  if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['wachtwoordL'])){
      $booleanL1 = false;
      $booleanL2 = false;
      require '../private/includes/log_in.php';
    } else if(!empty($_GET['wachtwoordR1'])){
      require '../private/includes/registeren.php';
    }
  }
  switch ($log_in) {
    case 'l1':
      $booleanL1 = false;
      break;
    case 'l2':
      $booleanL2 = false;
      break;
    case 'l3':
      $booleanL1 = false;
      $booleanL2 = false;
      break;
    case 'rG':
      $booleanG = false;
      break;
    case 'rH':
      $booleanH = false;
      break;
    case 'rE':
      $booleanE = false;
      break;
    case 'rGH':
      $booleanG = false;
      $booleanH = false;
      break;
    case 'rGE':
      $booleanG = false;
      $booleanE = false;
      break;
    case 'rHE':
      $booleanH = false;
      $booleanE = false;
      break;
    case 'rGHE':
      $booleanG = false;
      $booleanH = false;
      $booleanE = false;
      break;

  }
?>

<div id="grid">
  <div id="inloggen">
    <h2>Log In</h2>
    <?php
      if ($booleanL1 == false && $booleanL2 == false) {
        echo "<p class='false'>Account bestaat niet</p>";
      }
      else if($booleanL1 == false){
        echo "<p class='false'>Verkeerde gebruikersnaam of wachtwoord</p>";
      } else if($booleanL2 == false){
        echo "<p class='false'>Account is nog niet geactiveerd</p>";
      }
    ?>
    <form action="" method="get">
      <label for="gebruikersnaamL">Gebruikersnaam</label><br>
      <input type="text" name="gebruikersnaamL" required><br>
      <label for="wachtwoordL">Wachtwoord</label><br>
      <input type="password" name="wachtwoordL" required><br>
      <input type="submit" value="Log in"><br>
      <a href="http://www.jrjweb.nl/myband/public/aanpassen/wachtwoord">wachtwoord vergeten</a>
    </form>
  </div>
  <div id="registeren">
    <h2>Registeren</h2>
    <form action="" method="get">
      <?php
        if($booleanG == false){
          echo "<p class='false'>Deze gebruikersnaam is al in gebruik</p>";
        }?>
      <label for="gebruikersnaamR">Gebruikersnaam</label><br>
      <input type="text" name="gebruikersnaamR" required><br>
      <?php
        if($booleanH == false){
          echo "<p class='false'>Wachtwoorden zijn niet hetzelfde</p>";
        }?>
      <label for="wachtwoordR1">Wachtwoord</label><br>
      <input type="password" name="wachtwoordR1" required><br>
      <label for="wachtwoordR2">Herhaal Wachtwoord</label><br>
      <input type="password" name="wachtwoordR2" required><br>
      <?php
        if($booleanE == false){
          echo "<p class='false'>Dit emailadress is al in gebruik</p>";
        }?>
      <label for="email">Email</label><br>
      <input type="email" name="email" required><br>
      <input type="submit" value="Registeren">
    </form>
  </div>
</div>
