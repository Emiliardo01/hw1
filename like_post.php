<?php

session_start();

    $connessione= mysqli_connect("localhost", "root", "", "hmw1");

    $query = "SELECT id FROM Utente WHERE mail = '".$_SESSION['email']."'";

    $idpost = $_POST['id'];

    $res = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));


    $row = mysqli_fetch_assoc($res);

    $query2 = "INSERT INTO likes(idutente,idpost) VALUES('".$row['id']."','$idpost')";

    mysqli_query($connessione,$query2) or die("Errore: ".mysqli_error($connessione));
    mysqli_close($connessione);



?>