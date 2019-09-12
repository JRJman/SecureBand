<?php
    function adminSelect($con,$id){
        $sql = "SELECT * FROM account WHERE id='$id'";
        $statemant = $con->query($sql);

        $return = 'false';
        foreach ($statemant as $rij){
            $return = $rij['admin'];
        }

        return $return;
    }

    function adminUpdate($con, $variable, $boolean){
        $sql = "UPDATE account SET admin='$boolean' WHERE id='$variable'";
        $statement = $con->query($sql);
        return $statement;
    }

    function agendaBerichtUploaden($con,$array){
        $sql = "SELECT * FROM agenda";
        $statement = $con->query($sql);

        $id = 0;
        foreach ($statement as $rij){
            $id = $rij['id'] + 1;
        }
        $jaar = $array[0];
        $maand = $array[1];
        $dag = $array[2];
        $titel = $array[3];
        $tekst = $array[4];

        $sql = "INSERT INTO agenda VALUES('$id','$jaar','$maand','$dag','$titel','$tekst')";
        $statement = $con->query($sql);
        return $statement;
    }

    function nieuwsBerichtUploaden($con, $array){
        $id = 0;
        $array1 = $array[0];
        $array2 = $array[1];
        $array3 = $array[2];
        $array4 = $array[3];
        $array5 = $array[4];

        $sql = "SELECT * FROM nieuwsbericht";
        $statement = $con->query($sql);
        foreach ($statement as $rij){
            $id = $rij['id'] + 1;
        }

        $sql = "INSERT INTO nieuwsbericht VALUES ('' , '$array1' , '$array2' , '$array3' , '$array4' , '$array5')";
        $con->query($sql);
    }

    function emailAanpassen($con, $wachtwoord){
        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);
        $ver = "";
        foreach ($statement as $rij) {
            if(password_verify($wachtwoord, $rij['wachtwoord'])){
                $ver = $rij['vertificatie'];
            }
        }
        return $ver;
    }

    function emailUpdaten($con, $ver, $email, $ver2){
        $boolean = false;

        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);

        foreach ($statement as $rij){
            if($ver === $rij['vertificatie']){
                $boolean = true;
            }
        }

        if($boolean){
            $sql = "UPDATE account SET email='$email', vertificatie='$ver2' WHERE vertificatie='$ver'";
            $con->query($sql);
        }
        return $boolean;
    }

    function wachtwoordAanpassen1($con, $email){
        $b = "false";

        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            if($email == $rij['email']){
                $b = "true";
            }
        }
        return $b;
    }

    function wachtwoordAanpassen2($con, $email){
        $ver = "";

        $sql = "SELECT * FROM account WHERE email='$email'";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            $ver = $rij['vertificatie'];
        }
        return $ver;
    }

    function wachtwoordUpdaten($con,$ver, $ver2,$hash){
        $sql = "UPDATE account SET wachtwoord='$hash', vertificatie='$ver2' WHERE vertificatie='$ver'";
        $con->query($sql);
    }

    function verwijder($con, $variable){
        $sql = "DELETE FROM 'account' WHERE id='$variable'";
        $con->query($sql);
    }
?>