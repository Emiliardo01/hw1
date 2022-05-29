<?php

session_start();

$connessione= mysqli_connect("localhost", "root", "", "hmw1");

$query = "SELECT id FROM Utente WHERE mail = '".$_SESSION['email']."'";

$idpost = $_POST['id'];

$res = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));


$row = mysqli_fetch_assoc($res);

    $query2 = "DELETE FROM likes where idutente ='".$row['id']."' and idpost = '$idpost'";

    mysqli_query($connessione,$query2) or die("Errore: ".mysqli_error($connessione));
    mysqli_close($connessione);



?>