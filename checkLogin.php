<?php
    session_start();
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    require "connection.php";
    
    try{
        $querySelectUserPwd = "SELECT * FROM UTENTE WHERE(Username='$username')";
        $search = $conn->query($querySelectUserPwd);
    } catch (Exception $ex) {
        echo $ex;
    }
    
    $dati=$search->fetch();
    
    if($dati["Username"]==""){
        //Username sbagliato o non presente
        header("Location: "."index.php?errorlogin=1");
    } else if($dati["Username"]==$username && $dati["Password"]!=$password){
        //Username giusto, password sbagliata
        header("Location: "."index.php?errorlogin=2");
    } else if($dati["Username"]==$username && $dati["Password"]==$password){
        //user e password giusti
        $_SESSION["username"]=$username;
        $_SESSION["nome_utente"]=$dati["Nome"];
        $_SESSION["cognome_utente"]=$dati["Cognome"];
        $_SESSION["anno_nascita"]=$dati["AnnoNascita"];
        $_SESSION["luogo_nascita"]=$dati["LuogoNascita"];
        $_SESSION["foto"]=$dati["Foto"];
        $_SESSION["telefono"]=$dati["Telefono"];
        $_SESSION["num_matricola"]=$dati["NumMatricola"];
        $_SESSION["nome_corso_studi"]=$dati["NomeCorsoStudi"];
        $_SESSION["num_partite_calcio"]=$dati["NumPartiteCalcio"];
        $_SESSION["num_partite_pallavolo"]=$dati["NumPartitePallavolo"];
        $_SESSION["num_partite_tennis"]=$dati["NumPartiteTennis"];
        $_SESSION["tipo_utente"]=$dati["TipoUtente"];
        header("Location: "."home.php?errorlogin=0&register=-1");
    }
?>
