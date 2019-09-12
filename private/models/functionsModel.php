<?php
    function accountmaken($con, $array){
        $sql = "SELECT * FROM account";
        $statement = $con->query($sql);

        $id = 0;
        foreach ($statement as $rij){
            $id = $rij['id'];
        }

        $array1 = $array[0];
        $array2 = $array[1];
        $array3 = $array[2];
        $array4 = $array[3];
        $array5 = $array[4];
        $array6 = $array[5];

        $sql = "INSERT INTO account VALUES('$id', '$array1', '$array2', '$array3', '$array4', '$array5', '$array6')";
        $con->query($sql);
    }
?>