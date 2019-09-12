<?php
    function getGeschiedenis($con){
        $sql = "SELECT * FROM page WHERE page=1";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            echo $rij['tekst'];
        }
    }

    function getSpelregels($con){
        $sql = "SELECT * FROM page WHERE page=2";
        $statement = $con->query($sql);
        foreach ($statement as $rij) {
            echo $rij['tekst'];
        }
    }
?>