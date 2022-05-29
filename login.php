<?php 

    session_start();

    if(isset($_SESSION["email"])){

        header("Location: home.php");
        exit;


    }

    

    if(isset($_POST["email"]) && isset($_POST["password"])){

        
        $connessione= mysqli_connect("localhost", "root", "", "hmw1");

        $email = mysqli_real_escape_string($connessione, $_POST["email"]);
        
        $password = mysqli_real_escape_string($connessione, $_POST["password"]);

        $query = "SELECT * FROM Utente WHERE mail = '".$email."' AND password = '".$password."'";

        $res = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));

        if(mysqli_num_rows($res) > 0 ){

            $_SESSION["email"]= $_POST["email"];
            header("Location: home.php");
            exit;


        }else{

            $errore = true;


        }



    }




?>



<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Login
        </title>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="login.css">
    </head>
 
    <body>
           
    <div id="overlay">
        <h1>Login</h1>
        
        <?php 
        
        if(isset($errore)){

            echo "<p class='errore'>";
            echo "Credenziali non valide.";
            echo "</p>";


        }
        
        
        ?>
    <main>

        <form name = "login" method="post">
            
                <label>E-mail <input type='text' name='email'></label>
                <label>Password <input type='password' name='password'></label>
                <label>&nbsp;<input type='submit'></label>

        </form>

    </main>
    <div><a href="register.php">Non sei registrato? Clicca qui</a></div>


    <footer>
        <p>Powered By Emilio Cassaro, 2022, All Rights Reserved</p>
    </footer>

</body>
</div>

</html>