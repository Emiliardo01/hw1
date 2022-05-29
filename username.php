<?php

    if (!isset($_POST["username"])) {

        echo "Error";
        exit;
    }   
    
    $connessione = mysqli_connect("localhost", "root", "", "hmw1");

    $username = mysqli_real_escape_string($connessione, $_POST["username"]);

    $query = "SELECT username FROM Utente WHERE Username = '$username'";

    $res = mysqli_query($connessione, $query) or die(mysqli_error($connessione));

    if(mysqli_num_rows($res) > 0){

        $flag = false;

        $check = 'Username presente nel database!';


    }else {

        $check = 'Username verificato, è libero!';
        $flag = true;

    }

    $send[0]= $check;

    $send[1]= $flag;

    echo json_encode($send);

    mysqli_close($connessione);
?>



























































