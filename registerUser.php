<?php
    session_start();
    $nome=$_POST["nome"];
    $cognome=$_POST["cognome"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $annoNascita=$_POST["annoNascita"];
    $luogoNascita=$_POST["nascita"];
    $telefono=$_POST["telefono"];
    $matricola=$_POST["matricola"];
    $corso=$_POST["corso"];
    $foto=$_POST["foto"];
    
    //echo $nome." ".$cognome." ".$username." ".$password." ".$annoNascita." ".$luogoNascita." ".$telefono." ".$matricola." ".$corso." ".$foto;
    
    require 'connection.php';
    
    try{
        $queryCheckExistingUser = "SELECT Username FROM UTENTE WHERE(Username='$username');";
        $search=$conn->query($queryCheckExistingUser);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    $dati=$search->fetch();
    
    if($dati["Username"]==""){
        try{
            /*if($telefono<=99999999){
                $er="erT=1&";
            } else if($matricola<=999999){
                $er=$er."erM=1";
            }
            if($er!=""){
                header("Location: index.php?$er");
            }*/
            
            $queryInsertUser="INSERT INTO UTENTE(Username, Password, Nome, Cognome, AnnoNascita, LuogoNascita,  Foto, Telefono, NumMatricola, NomeCorsoStudi)"
                            ."VALUES('$username','$password','$nome','$cognome','$annoNascita','$luogoNascita','$foto','$telefono','$matricola','$corso');";
            $insert = $conn->prepare($queryInsertUser);
            $insert->execute();
            
            $_SESSION["username"]=$username;
            $_SESSION["nome_utente"]=$nome;
            $_SESSION["cognome_utente"]=$cognome;
            $_SESSION["anno_nascita"]=$annoNascita;
            $_SESSION["luogo_nascita"]=$luogoNascita;
            $_SESSION["foto"]=$foto;
            $_SESSION["telefono"]=$telefono;
            $_SESSION["num_matricola"]=$numMatricola;
            $_SESSION["nome_corso_studi"]=$corso;
            $_SESSION["num_partite_calcio"]=0;
            $_SESSION["num_partite_pallavolo"]=0;
            $_SESSION["num_partite_tennis"]=0;
            $_SESSION["tipo_utente"]="US";
            header("Location: "."index.php?register=-1");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    } else {
        header("Location: "."index.php?register=2&erU=1");
    }
    
?>

