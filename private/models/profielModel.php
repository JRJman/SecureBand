<?php
    function profielVars($con, $id, $ver){
        $array = array(false,'','');
        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            if($id === $rij['id']){
                if($ver === $rij['vertificatie']){
                    $checker = true;
                    $gebruikersnaam = $rij['gebruikersnaam'];
                    $email = $rij['email'];
                    $array = array($checker, $gebruikersnaam, $email);
                }
            }
        }
        return $array;
    }
?>