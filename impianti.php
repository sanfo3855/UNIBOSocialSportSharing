<html>
    <head>
        <title>Impianti</title>
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
            color: #ffffff;
        }
        .bg-2 { 
            background-color: #474e5d; /* Dark Blue */
            color: #ffffff;
        }
        .bg-3 { 
            background-color: #ffffff; /* White */
            color: #555555;
        }
        .bg-4 { 
            background-color: #2f2f2f; /* Black Gray */
            color: #fff;
        }
        .container-fluid {
            padding-top: 70px;
            padding-bottom: 70px;
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

    <!-- Navbar -->
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
                    <li><a href="impianti.php?register=<?php echo $_GET["register"]; ?>">IMPIANTI</a></li>
                    <?php
                    if ($_SESSION["username"] != "") {
                        ?>
                        <li><a href="#">FORUM</a></li>
                        <li><a href="profile.php?register=<?php echo $_GET["register"]?>"">PROFILE</a></li>
                        <li><a href="clearSession.php"> <img src="images/logout-512.png" style="width: 20px; height: 20px"> </a> </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Table Impianti -->
    <?php
    require 'connection.php';
    ?>
    <div class="container-fluid table-responsive bg-1 text-center">
        <div class="col-md-5 well" style=" margin-left:50px ">
            <table class="table">
                <thead>
                    <tr>
                        <td style=" color: #b52c27"><b>NOME</b></td>
                        <td style=" color: #b52c27"><b>INDIRIZZO</b></td>
                        <td style=" color: #b52c27"><b>TELEFONO</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Selection of IMPIANTI*
                    try {
                        $querySelectImpianti = "SELECT * FROM IMPIANTO";
                        $search = $conn->query($querySelectImpianti);
                    } catch (Exception $ex) {
                        echo $ex;
                    }

                    //print of impianti
                    while ($row = $search->fetch()) {
                        ?>            
                        <tr class="active">
                            <td><a style=" color: #b52c27" href=<?php echo "impianti.php?register=" . $_GET["register"] . "&lat=" . $row["Latitudine"] . "&long=" . $row["Longitudine"] ?>><?php echo $row['Nome'] ?></a></td>
                            <td><a style=" color: #b52c27" href=<?php echo "impianti.php?register=" . $_GET["register"] . "&lat=" . $row["Latitudine"] . "&long=" . $row["Longitudine"] ?>><?php echo $row['Via'] ?></a></td>
                            <td><a style=" color: #b52c27" href=<?php echo "impianti.php?register=" . $_GET["register"] . "&lat=" . $row["Latitudine"] . "&long=" . $row["Longitudine"] ?>><?php echo $row['Telefono'] ?></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <div class="col-md-6 well" style=" margin-left:50px ">
            <iframe
                width="100%"
                height="75%"
                frameborder="0" style="border:0"
                markers=""
                src="https://www.google.com/maps/embed/v1/place?q=<?php echo $_GET["lat"] . "," . $_GET["long"]; ?>&amp;key=AIzaSyBz5spRldnBLIdnpuQ_2tbm8C5In2-aIlY&amp;zoom=15 "
                </iframe>
        </div>
    </div>

</body>
</html>

