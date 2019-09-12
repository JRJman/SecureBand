<?php
    function activated($con, $gebruikersnaam){
        $sql = "UPDATE account SET active='true' WHERE gebruikersnaam='$gebruikersnaam'";
        $statement = $con->query($sql);

        return $statement;
    }
?>