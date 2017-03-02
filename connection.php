<?php

    //Reading dbconf.ini
    $ini_dbconf_array = parse_ini_file("dbconf.ini");
    $user = $ini_dbconf_array[user];
    $psw = $ini_dbconf_array[psw];
    $host = $ini_dbconf_array[host];
    $db = $ini_dbconf_array[db];
    
    //Connection to UNIBO Social Sport Sharing DB
    try{
        $conn = new PDO("mysql:host=$host; dbname=$db", $user, $psw);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connection Accepted"."<br>";
    } catch (Exception $ex) {
        echo "Error connecting UNIBOSocialSportSharingDB: ".$ex->getMessage();
    }
?>