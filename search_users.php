<?php

    session_start();

    if(!isset($_SESSION['email'])){

        header("Location: login.php");
        exit;

    }

    
    
    $connessione= mysqli_connect("localhost", "root", "", "hmw1");

    $query = "SELECT Username FROM Utente WHERE mail = '".$_SESSION['email']."'";

    $res = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));

    $res2 = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="search_users.js" defer="true"></script>
    <title> La Gastronomia di Emiliardo
    </title>

    <link rel="shortcut icon" href="http://localhost/hmw1/logobarra.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="search_users.css">
</head>

<body> <!-- selezione mi servirà nel css per il mobile-->

    <header>
        <div id='overlay'>
            <h1 id="selezione"> 
                <em id="potente">Sezione ricerca locale e su spotify....</em>
            </h1> 
        </div>


        <nav>
            <em id="scritta"> La Gastronomia di Emiliardo<br>

            <?php
      
      while($row2 = mysqli_fetch_row($res2)){

        echo "<p class='welcome'>";        
          echo "Benvenuto: " .$row2[0];
          echo "</p>";
      }
 ?>
            </em>
            <div id="bottoni">
           
                <a href="home.php">Home</a>
                <a href="posts.php">Post</a>
                <a href="logout.php">Esci</a>
                
            </div>
        </nav>

    </header>

    <div class="fotop"><img id= "img" src="logo_home.png" ></div> 

    <div class="testo">
        
    <?php
            while($row = mysqli_fetch_row($res)){

                echo "Username: " .$row[0];
            }
       ?>

    </div>

    <p id='scrittaform2'>Inserisci il nome dell'utente che vuoi cercare!!!</p>

    <form id="form" name="search" method="post">
            
            <label>Nome <input id="nome" type='text' name='nome' ></label>
            <label>Cognome <input id="cognome"type='text' name='cognome' ></label>
            <label>&nbsp;<input type='submit'></label>
            

    </form>

    <div id="view"></div>


    <form id='fsp' method='post'>
        <div id="scrittaform" >Inserisci nome del tuo artista preferito </div>
        <input type="text" id="artist" name='artist'>
        <input id ='cercasp' type="submit" value="Cerca">
        <img type="submit" src = 'open-graph-default.png'>
    </form>

    <div id="spotify"></div>



    <footer>

        <p><em>Università degli Studi di Catania <br> Emilio Cassaro </em></p>

        <p><em>Matricola:1000002219<br> e-mail:CSSMLE01A25C342N@studium.unict.it</em></p>

    </footer>

</body>

</html>