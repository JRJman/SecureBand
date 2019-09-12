<?php
    function boolean($con,$id,$ver){
        $header = false;
        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            if($_SESSION['id'] === $rij['id']){
                if($_SESSION['ver'] === $rij['vertificatie']){
                    $header = true;
                }
            }
        }
        return $header;
    }
?>