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
    <script src="home.js" defer="true"></script>
    <title> La Gastronomia di Emiliardo
    </title>

    <link rel="shortcut icon" href="http://localhost/hmw1/logobarra.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>

<body> <!-- selezione mi servirà nel css per il mobile-->

    <header>
        <div id='overlay'>
            <h1 id="selezione"> 
                <em id="potente">Sezione home per aggiungere post....</em>
            </h1> 
        </div>


        <nav>
            <em id="scritta"> La Gastronomia di Emiliardo<br>
            <?php
      
      while($row = mysqli_fetch_row($res)){

        echo "<p class='welcome'>";        
          echo "Benvenuto: " .$row[0];
          echo "</p>";
      }
 ?>
            </em>
            <div id="bottoni">
      
                <a href="home.php">Home</a>
                <a href="posts.php">Post</a>
                <a href="search_users.php">Cerca Utenti</a>
                <a href="logout.php">Esci</a>
                
            </div>
        </nav>

    </header>

    <div class="fotop"><img id= "img" src="logo_home.png" ></div> 

    <div class="testo">
        
    <?php
      
            while($row = mysqli_fetch_row($res2)){

                echo "Username: " .$row[0];
            }


       ?>

    </div>


    <article>



    </article>

    <div id="richiesta">Vuoi inserire un post? Inizia scegliendo un immagine!</div>
    <div id="genp">

        
    <button id="bottone">Clicca per inserire un immagine da commentare!</button>

        
        <div id='display'>

        

            <div id="piatto"></div>
            <div id="piatto2"></div>

        <button id="bottone2">Non ti piace? Clicca per generare altre foto!</button>
        <div id='interazione'>
            
  
        <label><input id="titolo" type='text' name='titolo' placeholder='Inserisci il titolo..'></label>
        <textarea id = 'tx' name='post' rows='15' cols='40' placeholder='Inserisci il post..'></textarea>
        <label>&nbsp;<input id='bottone3' type='submit'></label>
    
        </div>
        </div>

    </div>

  

    <footer>

        <p><em>Università degli Studi di Catania <br> Emilio Cassaro </em></p>

        <p><em>Matricola:1000002219<br> e-mail:CSSMLE01A25C342N@studium.unict.it</em></p>

    </footer>

</body>

</html>