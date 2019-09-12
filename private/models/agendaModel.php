<?php
    function getAgenda($con, $whereVar){
        $sql = "SELECT * FROM agenda WHERE maand='$whereVar[0]' AND jaar='$whereVar[1]' AND dag='$whereVar[2]'";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
          echo "<div class='bericht' onclick='bericht(" . $rij['id'] . ")'>";
          echo $rij['titel'];
          echo "</div>";
        }
    }

    function getAgendaBericht($con,$id){
        $sql = "SELECT * FROM agenda WHERE id='$id'";
        $statement = $con->query($sql);

        foreach ($statement as $rij) {
            echo "<h2>" . $rij['titel'] . "</h2>";
            echo "<h4>Het bericht</h4>";
            echo "<p>" . $rij['bericht'] . "</p>";
        }
    }
?>