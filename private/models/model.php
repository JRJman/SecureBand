<?php
  function SQLselect($con,$table,$what,$where,$whereColumn,$whereVar, $whereAmount){
    $statement = '';
    if($where == "true"){
      $wheres = '';
      for ($i=0; $i < $whereAmount; $i++) {
        $wheres = $wheres . $whereColumn[$i] . "='" . $whereVar[$i] . "'";
        if($i + 1 != $whereAmount){
          $wheres = $wheres . ' AND ';
        }
      }
      $sql = "SELECT $what FROM $table WHERE $wheres";
      $statement = $con->query($sql);
    }else{
      $sql = "SELECT $what FROM $table";
      $statement = $con->query($sql);
    }
    return $statement;
  }

  function SQLinsert($con, $table, $arrayValues, $arrayAmount){
//    $statement = SQLselect($con,'account','*','false','niks','niks',0);
//    $id = 0;
//    foreach ($statement as $rij) {
//      $id = $rij['id'] + 1;
//    }

    $values = "' ', ";
    for ($i=0; $i < $arrayAmount; $i++) {
      $values = $values . "'" . $arrayValues[$i] . "'";
      if ($i + 1 != $arrayAmount) {
        $values = $values . ', ';
      }
    }

    $sql = "INSERT INTO $table VALUES ($values)";
    $statement = $con->query($sql);
    return $statement;
  }

  function SQLupdate($con, $table, $whatColumn, $whatVar, $whatAmount, $whereColumn, $whereVar, $whereAmount){
    $whats = '';
    $wheres = '';

    for ($i = 0; $i < $whatAmount; $i++){
        $whats = $whats . $whatColumn[$i] . "='" . $whatVar[$i] . "'";
        if($i+1 != $whatAmount){
            $whats = $whats . ', ';
        }
    }

      for ($i = 0; $i < $whereAmount; $i++){
          $wheres = $wheres . $whereColumn[$i] . "='" . $whereVar[$i] . "'";
          if($i+1 != $whereAmount){
              $wheres = $wheres . ', ';
          }
      }

    $sql = "UPDATE $table SET $whats WHERE $wheres";
    $statement = $con->query($sql);
    return $statement;
  }

  function SQLdelete($con,$table,$whereColumn,$whereVar,$whereAmount){
      $wheres = "";
      for ($i = 0; $i < $whereAmount; $i++){
          $wheres = $wheres . $whereColumn[$i] . "='" . $whereVar[$i] . "'";
          if($i+1 != $whereAmount){
            $wheres = $wheres . " AND ";
        }
      }


      $sql = "DELETE FROM $table WHERE $wheres";
      $statement = $con->query($sql);
      return $statement;
  }

  function SQLsearch($con, $search){
      $sql = "SELECT * FROM nieuwsbericht WHERE tekst LIKE '%$search%' ORDER BY datum DESC";
      $statement = $con->query($sql);
      return $statement;
  }
?>