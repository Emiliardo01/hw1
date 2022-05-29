<?php

    if (!isset($_POST["email"])) {

        echo "Error";
        exit;
    }   
    
    $connessione = mysqli_connect("localhost", "root", "", "hmw1");

    $email = mysqli_real_escape_string($connessione, $_POST["email"]);

    $query = "SELECT mail FROM Utente WHERE mail = '$email'";

    $res = mysqli_query($connessione, $query) or die(mysqli_error($connessione));

    if(mysqli_num_rows($res) > 0){

        $flag = false;

        $check = 'Mail presente nel database!';


    }else {

        $check = 'Mail verificata, tutto ok!';
        $flag = true;

    }

    $send[0]= $check;

    $send[1]= $flag;

    echo json_encode($send);

    mysqli_close($connessione);
?>



























































