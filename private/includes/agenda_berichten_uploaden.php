<?php
  $boolean = false;
  session_start();
  if(!empty($_SESSION['a'])){
    if($_SESSION['a'] == "true"){
      $boolean = true;
    }
  }
  if(!$boolean){
    header("Location: http://www.jrjweb.nl/myband/public/");
  }

  $boolean = false;
  if(!empty($_POST['titel'])){
    if(!empty($_POST['tekst'])){
      if(!empty($_POST['datum'])){
        $boolean = true;
      }
    }
  }
  if(!$boolean){
    header("Location: http://www.jrjweb.nl/myband/public/verboden_voor_jouw");
  }
  $titel = $_POST['titel'];
  $tekst = $_POST['tekst'];
  $datum = $_POST['datum'];

  $datum_array = explode('-', $datum);

  $jaar = $datum_array[0];
  $maand = $datum_array[1];
  $dag = $datum_array[2];

  $arrayValues = array($jaar,$maand,$dag,$titel,$tekst);

  $con = dbConnect();
//  SQLinsert($con,'agenda',$arrayValues, 5);
  agendaBerichtUploaden($con,$arrayValues);

  header("Location: http://www.jrjweb.nl/myband/public/admin");
?>
