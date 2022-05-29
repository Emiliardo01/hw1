<?php

   session_start();


   if(isset($_POST["nome"]) && isset($_POST["cognome"])&& isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["genere"])&& isset($_POST["username"])){

    $connessione = mysqli_connect("localhost", "root", "", "hmw1");
    $errores = array();
     
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errores[] = "email che non rispetta le credenziali";
        }
        else {
            $email = mysqli_real_escape_string($connessione, $_POST['email']);
            $query = "SELECT mail FROM Utente WHERE mail ='$email'";
            $res = mysqli_query($connessione, $query);
            if (mysqli_num_rows($res) > 0) {
                $errores[] = "email già utilizzata";
            }
        }

        
        if(strlen($_POST["password"]) < 8 || strlen($_POST["password"]) > 15 || strlen($_POST["password"]) == 0){
            $errores[] = "password non valida";
        }

       
        
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])){
            $errores[] = "username  ";
        }else{
            $username = mysqli_real_escape_string($connessione, $_POST['username']);
            $query = "SELECT username FROM Utente WHERE username ='$username'";
            $res = mysqli_query($connessione, $query);
            //controllo che sia univoco
            if (mysqli_num_rows($res) > 0){
                $errores[] = "username già utilizzato";
            }
        }
        

            
    if(count($errores) == 0){

        $nome = mysqli_real_escape_string($connessione, $_POST["nome"]);

        $cognome = mysqli_real_escape_string($connessione, $_POST["cognome"]);
    
        $email = mysqli_real_escape_string($connessione, $_POST["email"]);

        $password = mysqli_real_escape_string($connessione, $_POST["password"]);

        $genere = mysqli_real_escape_string($connessione, $_POST["genere"]);
    
        $username = mysqli_real_escape_string($connessione, $_POST["username"]);

        $query = "INSERT into Utente(Nome, Cognome, mail, Password, Genere, Username) values('$nome','$cognome','$email', '$password', '$genere', '$username')";

       

    }else {

        $errore = true;

    }

    
   

    if(mysqli_query($connessione, $query)){
    
        $corretto = true;

       
   
      
        mysqli_close($connessione);
        
        
    
    }else{

       $errore= true;

    }

  
   }


   session_destroy();
         

?>


<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="register.js" defer="true"></script>
        <title> Registrati
        </title>
        <link rel="shortcut icon" href="http://localhost/hmw1/logobarra.jpg" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="register.css">
    </head>
 
    <body>

           
    <div id="overlay">
        <h1>Compila inserendo i tuoi dati</h1>
        
        <div id='errore'>

        <?php 
                
                if(isset($errore)){
            
                    echo "<p class='errore'>";
                    echo "Errore nella registrazione, controlla le credenziali o cambia username/email.";
                    echo "</p>";
            
            
                }else if (isset($corretto)){
            
                    $hide = 2 ;
                    echo "<p class='successo'>";
                    echo "Grazie ".$username." per la registrazione.";
                    echo "</p>";
            
            
                }
              
                ?>
            
        </div>


    <main>

    <?php if(!isset($hide)){ ?>

        <form id="form" name="register" method="post">
            
                <div id='divnom'><label>Nome <input id="nome" type='text' name='nome' ></label></div>
                <div id='divcogn'><label>Cognome <input id="cognome"type='text' name='cognome' ></label></div>
                <div id='warninge'><label>E-mail <input id="email" type='text' name='email' ></label></div>
                <div id='warningu'><label>Username <input id="username" type='text' name='username' ></label></div>
                <label>Password <input id="pw" type='password' name='password' ></label>
                <p id="radio">
                Maschio<input id="m" type='radio' name='genere' value='m'>
                Femmina<input id="f" type='radio' name='genere' value='f'>
                </p>
                <label>&nbsp;<input type='submit'></label>
                

        </form>

        <?php }?>
 
    </main>


    <a  href="login.php">Torna al Login!</a>

    <footer>
        <p>Powered By Emilio Cassaro, 2022, All Rights Reserved</p>
    </footer>

</body>


</html>