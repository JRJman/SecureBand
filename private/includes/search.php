<?php
  require "functions.php";
  require __DIR__ . '/../models/homeModel.php';

  $search = $_GET['search'];
  $nummerGet = $_GET['nummer'];

  $nummer1 = $nummerGet * 2;
  $nummer2 = $nummer1 - 1;
  $nummer3 = 1;

  $con = dbConnect();
  search($con, $search, $nummerGet);
?>
