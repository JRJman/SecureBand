<?php
  $boolean = false;
  $con = dbConnect();
  $statement = aanpassenEmail($con);
  foreach ($statement as $rij) {
    if($tekst === $rij['vertificatie']){
      $boolean = true;
    }
  }
  if($boolean == false){
    header("http://www.jrjweb.nl/myband/public/verboden_voor_jouw");
  }
?>
<form action="http://www.jrjweb.nl/myband/public/php/emailU" method="post">
  <label>Typ je nieuwe email in</label><br>
  <input type="email" name="email" required><br>
  <input type="submit" value="versturen">
  <input type="hidden" name="ver" value="<?php echo $tekst; ?>">
</form>
