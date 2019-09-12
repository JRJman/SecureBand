<?php
  $boolean = false;
  if(!empty($_SESSION['a'])){
    if($_SESSION['a'] == "true"){
      $boolean = true;
    }
  }
  if(!$boolean){
    header("Location: http://www.jrjweb.nl/myband/public/");
  }
?>

<h2>Admin</h2>

<div id="forms">
  <div class="grid" id="news">
    <form action="http://www.jrjweb.nl/myband/public/php/berichtH" method="post" enctype="multipart/form-data">
      <h3>Bericht uploaden op homepage</h3>
      <label for="titel">Titel *</label><br>
      <input type="text" name="titel" class="input" required><br>
      <label for="tekst">Tekst *</label><br>
      <textarea name="tekst" rows="10" cols="50"></textarea>
      <label for="image">Image *</label><br>
      <input type="file" name="image" required><br><br>
      <label for="bron">Bron *</label><br>
      <input type="text" name="bron" class="input" required><br>
      <label for="datum">Datum *</label><br>
      <input type="date" name="datum" class="input" value="<?php echo date('Y') . '-' . date('m') . '-' . date('d'); ?>" required><br>
      <input type="submit" value="Uploaden">
    </form>
  </div>
  <div class="grid" id="agenda">
    <form action="http://www.jrjweb.nl/myband/public/php/berichtA" method="post">
      <h3>Bericht uploaden op agenda</h3>
      <label for="titel">Titel *</label><br>
      <input type="text" name="titel" class="input" required><br>
      <label for="tekst">Tekst *</label><br>
      <textarea name="tekst" rows="10" cols="50"></textarea>
      <label for="datum">Datum *</label><br>
      <input type="date" name="datum" class="input" value="<?php echo date('Y') . '-' . date('m') . '-' . date('d'); ?>" required><br>
      <input type="submit" value="Uploaden">
    </form>
  </div>
</div>
<div id="accounts">
  <div class="table">
    <h3>Accounts</h3>
    <table>
      <tr>
        <th>Gebruikersnaam</th>
        <th>Email</th>
        <th>Active</th>
        <th>Admin</th>
        <th>Verwijderen</th>
      </tr>
      <?php
        $con = dbConnect();
        accountTabel($con);
      ?>
    </table>
  </div>
</div>
<script src="http://www.jrjweb.nl/myband/public/js/admin.js"></script>
