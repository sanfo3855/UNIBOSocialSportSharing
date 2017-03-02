<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style>
        body {
            font: 30px Montserrat, sans-serif;
            line-height: 1.8;
            color: #f5f6f7;
        }
        p {font-size:40px;}
        .margin {margin-bottom: 45px;}
        .bg-1 { 
            background-color: #b52c27; /* Red dio */
            color: #cccccc;
        }
        .bg-2 { 
            background-color: #474e5d; /* Dark Blue */
            color: #ffffff;
        }
        .bg-3 { 
            background-color: #cccccc; /* White */
            color: #b52c27;
        }
        .bg-4 { 
            background-color: #2f2f2f; /* Black Gray */
            color: #fff;
        }
        .container-fluid {
            padding-top: 70px;
            padding-bottom: 50px;
        }
        .navbar {
            padding-top: 15px;
            padding-bottom: 15px;
            border: 0;
            border-radius: 0;
            margin-bottom: 0;
            font-size: 12px;
            letter-spacing: 3px;
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
    <!-- Top Menu -->
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
                        <li><a href="profile.php?register=<?php echo $_GET["register"]?>">PROFILE</a></li>
                        <li><a href="clearSession.php"> <img src="images/logout-512.png" style="width: 20px; height: 20px"> </a> </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Primary Container -->
    <div class="container-fluid bg-1 text-center">
        <div class="row">
            <!--Introduzione column-->
            <?php
            if ($_SESSION["username"] != "") {
                ?>
                <div class="col-md-12">
                    <h3 class="margin">Ciao <?php echo $_SESSION["nome_utente"] . " " . $_SESSION["cognome_utente"] ?>!</h3>
                    <img src="images/usss.png" class="img-responsive margin" style="display:inline" alt="Bird" width="350" height="350">
                </div>
                <?php
            } else {
                ?>
                <div class="col-md-10">
                    <h3 class="margin">Condividi la tua passione per lo sport con altri studenti dell'Ateneo di Bologna!</h3>
                    <img src="images/usss.png" class="img-responsive margin" style="display:inline" alt="Bird" width="350" height="350">
                    <?php
                    if ($_GET["register"] == 1) {
                        ?>
                        <h3><a href="showRegister.php" style="color:#cccccc">Registrati</a> e trova subito il tuo match!</h3>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }

            if ($_GET['register'] == 1) {
                ?>
                <!--Accedi colum-->
                <div class="container-fluid col-md-2">
                    <span class="float-rigth">
                        <br><br>
                        <form class="form-horizontal" action=checkLogin.php method="post">
                            <fieldset>
                                <!--Username input-->
                                <!--<label class="col-md-4 control-label" for="foto">Accedi</label>-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="username" name="username" type="username" placeholder="Username" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!--Password input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!--Stampa errorlogin-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        if ($_GET["errorlogin"] == 1) {
                                            ?>
                                            <h5>Username sbagliato o non registrato</h5>
                                            <?php
                                        } else if ($_GET["errorlogin"] == 2) {
                                            ?>
                                            <h5>Password errata</h5>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!--Button Accedi-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <button id="accessButton" type="submit" class="btn btn-default btn-lg">Accedi</button>
                                        </div>
                                        <div class=" col-md-6" style=" padding-top: 6%">
                                            <h6> o <a href="home.php?register=2" style=" color: #cccccc">Registrati</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </span>
                </div>


                <?php
            } else if ($_GET["register"] == 2) {
                ?>
                <div class="container-fluid col-md-2" style=" padding-top: 15px; padding-right: 30px;">
                    <span class="float-right">
                        <form class="form-horizontal" action="registerUser.php" method="post">
                            <fieldset>
                                <h5 style=" text-align: left">REGISTRATI</h5>
                                <!-- Nome input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!--Stampa errorregister Nome-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        if ($_GET["errorregister"] == 2) {
                                            ?>    
                                            <h6>Non lasciare il campo vuoto</h6>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- Cognome input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="cognome" name="cognome" type="text" placeholder="Cognome" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!--Stampa errorregister Username-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        if ($_GET["errorregister"] == ["1"]) {
                                            ?>    
                                            <h6>Username non disponibile</h6>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- Username input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
                                    </div>
                                </div
                                <!--Stampa errorregister Username-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <?php
                                        if ($_GET["erU"] == 1) {
                                            ?>    
                                            <h6>Username non disponibile</h6>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Select Nascita -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select id="annoNascita" name="annoNascita" class="form-control">
                                            <option value="-1">Anno di Nascita</option>
                                            <option value="1988">1988</option>
                                            <option value="1989">1989</option>
                                            <option value="1990">1990</option>
                                            <option value="1991">1991</option>
                                            <option value="1992">1992</option>
                                            <option value="1993">1993</option>
                                            <option value="1994">1994</option>
                                            <option value="1995">1995</option>
                                            <option value="1996">1996</option>
                                            <option value="1997">1997</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Luogo Nascita input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="nascita" name="nascita" type="text" placeholder="Luogo di nascita" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- numTelefono input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="telefono" name="telefono" type="text" placeholder="Telefono" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Matricola input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="matricola" name="matricola" type="text" placeholder="Matricola" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- CorsoStudi input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="corso" name="corso" type="text" placeholder="Corso di studio" class="form-control input-md" required="">
                                    </div>
                                </div>

                                <!-- Foto input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="foto" name="foto" type="file" placeholder="Foto" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Button Registrati-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button id="registrati" type="submit" class="btn btn-default btn-md">Registrati</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="home.php?register=1" style=" color: #cccccc"><h5>Torna ad Accedi</h5></a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </span>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- Rules Container -->
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