<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>    
            /* Set black background color, white text and some padding */
            body {
                font: 30px Montserrat, sans-serif;
                line-height: 1.8;
                color: #f5f6f7;
            }
            p {font-size:40px;}
            .margin {margin-bottom: 45px;}
            .navbar {
                padding-top: 15px;
                padding-bottom: 15px;
                border: 0;
                border-radius: 0;
                margin-bottom: 0;
                font-size: 12px;
                letter-spacing: 3px;
            }

            .bg-3 { 
                background-color: #cccccc; /* White */
                color: #b52c27;
            }

            .navbar-nav  li a:hover {
                color: #1abc9c !important;
            }
        </style>
        <?php
        //starting session to store data usable in multiple pages
        session_start();
        ?>
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" style="font-size: 250%" href="home.php?register=<?php echo $_GET["register"]; ?>">Unibo Social Sport Sharing</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if ($_SESSION["username"] != "") {
                            ?>
                            <li><a href="#">PARTITE</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="impianti.php?register=<?php echo $_GET["register"]."&lat=44.4937143&long=11.3428948";?>">IMPIANTI</a></li>
                        <?php
                        if ($_SESSION["username"] != "") {
                            ?>
                            <li><a href="#">FORUM</a></li>
                            <li><a href="profile.php?register<?php echo $_GET["register"]; ?>">PROFILE</a></li>
                            <li><a href="clearSession.php"> <img src="images/logout-512.png" style="width: 20px; height: 20px"> </a> </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid text-center"style=" padding-top: 20px; background-color: #b52c27; padding-left: 30px;padding-right: 30px">    
            <div class="row">
                <div class="col-sm-2 well"style=" background-color: #cccccc; border-color: #cccccc">
                    <div 
                    <?php
                    require 'connection.php';

                    //Selection Foto
                    try {
                        $querySelectFotoUtente = "SELECT Foto FROM UTENTE WHERE(Username='" . $_SESSION["username"] . "');";
                        $result = $conn->query($querySelectFotoUtente);
                    } catch (Exception $ex) {
                        echo $ex;
                    }

                    $fotoUtente = $result->fetch();
                    ?>  </div>
                    <p><h4 style=" color: #b52c27;"><?php echo $_SESSION["nome_utente"] . " " . $_SESSION["cognome_utente"] ?></h4></p>
                    <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="<?php echo $fotoUtente["Foto"] ?>" class="img-circle" height="120" width="120" alt="Avatar">
                        </div>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="title">Profile</h4>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <img src="<?php echo $fotoUtente["Foto"] ?>" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                                            <h3 class="media-heading" style=" color: #2f2f2f"><?php echo $_SESSION["nome_utente"] . " " . $_SESSION["cognome_utente"] ?><br><small><?php echo $_SESSION["nome_corso_studi"] ?></small>
                                                <br><small>N° Matricola: <?php echo $_SESSION["num_matricola"] ?></small></h3>
                                        </center>
                                        <hr>
                                        <center>
                                            <h3><small> Anno di Nascita: <?php echo $_SESSION["anno_nascita"] ?><br>
                                                    Luogo di nascita: <?php echo $_SESSION["luogo_nascita"] ?><br>
                                                    Telefono: <?php echo $_SESSION["telefono"] ?><br>
                                                    Tipo Utente: <?php echo $_SESSION["tipo_utente"] ?><br>
                                                </small></h3> 
                                        </center>
                                    </div>
                                    <div class="modal-footer">
                                        <center>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p>
                        <h5><small><i>Click per informazioni</i></small></h5>
                        </p>
                </div>
            </div>     
        </div>
    </div>
</div>

<div class="container-fluid bg-3 text-center" style=" padding-top: 20px">
    <div>
        <?php
        require 'connection.php';

        //Selection of Regolamento and Foto
        try {
            $querySelectPallavolo = "SELECT Regolamento, Foto FROM SPORT";
            $result = $conn->query($querySelectPallavolo);
        } catch (Exception $ex) {
            echo $ex;
        }
        $i = 0;
        while ($row = $result->fetch()) {
            $regolamenti[$i] = $row['Regolamento'];
            $foto[$i] = $row['Foto'];
            $i++;
        }
        ?>  </div>  
    <!--<h2 class="margin">Trova il tuo sport</h2><br>-->
    <div class="row">
        <div class="col-sm-4">
            <a href="<?php echo $regolamenti[1] ?>" target="_blank" style="color:#990000" >

                <h3>Scopri la pallavolo</h3>
                <img src="<?php echo $foto[1] ?>" class="img-responsive margin" style="display:inLine" alt="volleyRules" width="200" height="200">
            </a>
        </div>

        <div class="col-sm-4"> 
            <a href="<?php echo $regolamenti[0] ?>" target="_blank" style="color:#990000" >
                <h3>Scopri il calcio</h3>
                <img src="<?php echo $foto[0] ?>" class="img-responsive margin" style="display:inLine" alt="calcioRules" width="210" height="210">
            </a>
        </div>
        <div class="col-sm-4"> 
            <a href="<?php echo $regolamenti[2] ?>" target="_blank" style="color:#990000" >
                <h3>Scopri il tennis</h3>
                <img src="<?php echo $foto[2] ?>" class="img-responsive margin" style="display:inLine" alt="tennisRules" width="190" height="190">
            </a>
        </div>
    </div>
</div>

</body>
</html>

