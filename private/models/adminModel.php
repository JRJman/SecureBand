<?php
    function accountTabel($con){
        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            echo "<tr>";
            echo "<td>" . $rij['gebruikersnaam'] . "</td>";
            echo "<td>" . $rij['email'] . "</td>";
            echo "<td>" . $rij['active'] . "</td>";
            echo "<td class=hover onclick=admin(" . $rij['id'] . ")>" . $rij['admin'] . "</td>";
            echo "<td class='verwijder hover' onclick=verwijder(" . $rij['id'] . ")>Verwijderen</td>";
            echo "</tr>";
        }

    }
?>