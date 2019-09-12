<?php
    require 'functions.php';
    require __DIR__ . '/../models/agendaModel.php';
    $con = dbConnect();

    $maand = $_GET['maand'];
    $jaar = $_GET['jaar'];
    $RealDay = date('j');
    $RealMonth = date('n');
    $RealYear = date('Y');
    $boolean = false;
    $hour = 0;
    $minute = 0;
    $second = 0;
    $year = $jaar;
    $month = $maand;
    if($month > 12){
      $month = 1;
      $year = $year + 1;
    }else if($month <= 0){
      $year = $year - 1;
      $month = 12;
    }
    $month2 = $month;
    $day = 1;
    $monthUp = $month + 1;
    $monthDown = $month - 1;
    $wordMonth = date('F', mktime($hour,$minute,$second,$month,$day,$year));
    echo "<p class='date'>" . $year . " " . $wordMonth . "</p>";
    echo "<input type=button value='vorige maand' id=down class='button' onclick=ajaxAgenda(" . $monthDown ."," . $year . ")>";
    echo "<input type=button value='volgende maand' id=up class='button' onclick=ajaxAgenda(" . $monthUp ."," . $year . ")>";
    echo "<table><tr><th>week</th><th>ma</th><th>di</th><th>wo</th><th>do</th><th>vr</th><th>za</th><th>zo</th></tr>";
    while($boolean == false){
      $checker = date('l', mktime($hour,$minute,$second,$month,$day,$year));
      if($checker == "Monday"){
        $boolean = true;
      }
      if ($day == 1) {
        $month = $month - 1;
        $day = date('t', mktime($hour,$minute,$second,$month,$day,$year));
      } else {
        $day = $day - 1;
      }
    }

    $boolean = false;

    while ($boolean == false) {
      echo "<tr>";
      echo "<th>";
      echo date('W', mktime($hour,$minute,$second,$month,$day,$year));
      echo "</th>";
      for ($i=0; $i < 7 ; $i++) {
        $monthDays = date('t', mktime($hour,$minute,$second,$month,$day,$year));
        if($day == $monthDays){
          $day = 1;
          $month = $month + 1;
        } else {
          $day = $day + 1;
        }
        if($month2 == $month && $monthDays == $day){
          $boolean = true;
        }

        $whereVar = array($month, $year, $day);

        if($month != $month2){
          echo "<th class='grey nummers'>";
        }else if($day == $RealDay && $month == $RealMonth && $year == $RealYear){
          echo "<th class='today nummers'>";
        }else{
          echo "<th class='nummers'>";
        }
        echo "<div class=number>";
        echo $day;
        echo "</div>";
        GetAgenda($con, $whereVar);
        echo "</th>";
      }
      echo "</tr>";
    }
    echo "</table>";
?>
