<?php
    function aanpassenEmail($con){
        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);

        return $statement;
    }

    function aanpassenWachtwoord($con){
        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);

        return $statement;
    }
?>