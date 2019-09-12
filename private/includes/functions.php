<?php

require __DIR__ . '/../models/functionsModel.php';

function dbConnect(){

    $config = require __DIR__ . '/config.php';

    try {
        $dsn = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'];

        $connection = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;

    } catch (\PDOException $e) {
        echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
    }

}

function maakAccount($gebruikersnaam, $wachtwoord, $email){
  $hash = password_hash($wachtwoord, PASSWORD_BCRYPT);
  $ver = code();
  $con = dbConnect();
  $arrayValues = array($gebruikersnaam,$hash,$email,'false',$ver,'false');
  accountmaken($con, $arrayValues);
  $link = "http://www.jrjweb.nl/myband/public/mail/activatie/'$gebruikersnaam'";
  $msg = "click op deze link om u account te activeren\n" . $link;
  $result = mail($email, 'Activatie Account', $msg);
}

function code(){
    $code = "";
    for ($i = 0; $i < 10; $i++) {
      $number = mt_rand(1, 36);

      switch ($number) {
        case 1:
        $code = $code . "A";
        break;

        case 2:
        $code = $code . "B";
        break;

        case 3:
        $code = $code . "C";
        break;

        case 4:
        $code = $code . "D";
        break;

        case 5:
        $code = $code . "E";
        break;

        case 6:
        $code = $code . "F";
        break;

        case 7:
        $code = $code . "G";
        break;

        case 8:
        $code = $code . "H";
        break;

        case 9:
        $code = $code . "I";
        break;

        case 10:
        $code = $code . "J";
        break;

        case 11:
        $code = $code . "K";
        break;

        case 12:
        $code = $code . "L";
        break;

        case 13:
        $code = $code . "M";
        break;

        case 14:
        $code = $code . "N";
        break;

        case 15:
        $code = $code . "O";
        break;

        case 16:
        $code = $code . "P";
        break;

        case 17:
        $code = $code . "Q";
        break;

        case 18:
        $code = $code . "R";
        break;

        case 19:
        $code = $code . "S";
        break;

        case 20:
        $code = $code . "T";
        break;

        case 21:
        $code = $code . "U";
        break;

        case 22:
        $code = $code . "V";
        break;

        case 23:
        $code = $code . "W";
        break;

        case 24:
        $code = $code . "X";
        break;

        case 25:
        $code = $code . "Y";
        break;

        case 26:
        $code = $code . "Z";
        break;

        case 27:
        $code = $code . "1";
        break;

        case 28:
        $code = $code . "2";
        break;

        case 29:
        $code = $code . "3";
        break;

        case 30:
        $code = $code . "4";
        break;

        case 31:
        $code = $code . "5";
        break;

        case 32:
        $code = $code . "6";
        break;

        case 33:
        $code = $code . "7";
        break;

        case 34:
        $code = $code . "8";
        break;

        case 35:
        $code = $code . "9";
        break;

        case 36:
        $code = $code . "0";
        break;
      }
    }
    return $code;
  }
