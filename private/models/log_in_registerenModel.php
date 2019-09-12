<?php
    function logIn($con, $gebruikersnaam, $wachtwoord){
        $b1 = false;
        $b2 = false;
        $bL1 = false;
        $bL2 = false;
        $id = 0;
        $admin = "";
        $ver = "";

        $sql = "SELECT * FROM account WHERE gebruikersnaam='$gebruikersnaam'";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            if($gebruikersnaam === $rij['gebruikersnaam']){
                $b1 = true;
            }
            if(password_verify($wachtwoord, $rij['wachtwoord'])){
                $b2 = true;
            }
            if($b1 && $b2){
                if($rij['active'] == "true"){
                    $bL1 = true;
                    $bL2 = true;
                    $id = $rij['id'];
                    $ver = $rij['vertificatie'];
                    $admin = $rij['admin'];
                } else {
                    $bL2 = false;
                }
            }
        }

        $checker = array($b1,$b2,$bL1,$bL2,$id,$admin,$ver);
        return $checker;
    }

    function registeren($con, $gebruikersnaam, $email){

        $bG = true;
        $bE = true;

        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            if($gebruikersnaam === $rij['gebruikersnaam']){
              $bG = false;
            }
            if($email === $rij['email']){
              $bE = false;
            }
        }

        $array = array($bG, $bE);
        return $array;
    }
?>