<?php
$boolean = false;
if(!empty($_SESSION['a'])){
  if($_SESSION['a'] == "true"){
    $boolean = true;
  }
}
if(!$boolean){
  header("Location: http://localhost/test/public/");
}

$boolean = false;
if(!empty($_POST['titel'])){
  if(!empty($_POST['tekst'])){
    if(!empty($_POST['bron'])){
      if(!empty($_POST['datum'])){
        $boolean = true;
      }
    }
  }
}
if(!$boolean){
  header("Location: http://localhost/test/public/verboden_voor_jouw");
}

if(isset($_FILES['image'])){
  $errors = array();
  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];

  $filename_deel = explode('.',$_FILES['image']['name']);
  $bestandstype = end($filename_deel);
  $file_ext = strtolower($bestandstype);
  $bestandstypen = array("jpeg","jpg","png");

  if(in_array($file_ext,$bestandstypen)=== false){
  $errors[] = "<script>console.log('Dit bestandstype kan niet, kies een JPEG of een PNG bestand.');</script>";
  }

  if($file_size > 2097152){
    $errors[] ='Het bestand moet kleiner zijn dan 2 MB';
  }

  if(empty($errors)==true){
    move_uploaded_file($file_tmp,"images/".$file_name);
  } else{
    header("Location: http://www.jrjweb.nl/myband/public/verboden_voor_jouw");
  }



  $titel = $_POST['titel'];
  $tekst = $_POST['tekst'];
  $bron = $_POST['bron'];
  $datum = $_POST['datum'];

  $con = dbConnect();
  $arrayValues = array($titel,$file_name,$tekst,$datum,$bron);
  //  SQLinsert($con, 'nieuwsbericht',$arrayValues,5);
  nieuwsBerichtUploaden($con,$arrayValues);

  } else {
    header("Location: http://www.jrjweb.nl/myband/public/verboden_voor_jouw");
  }

  header("Location: http://www.jrjweb.nl/myband/public/admin");

?>
