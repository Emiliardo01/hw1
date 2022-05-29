<?php

session_start();

    $connessione= mysqli_connect("localhost", "root", "", "hmw1");


    $idpost = $_POST['id'];


    $query = "SELECT nlikes FROM posts WHERE id = '$idpost' ";

    $res = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));

    while($row = mysqli_fetch_assoc($res)){

        $array[] = array("nlike" => $row, "idpost" => $_POST['id']);
  
        
        echo json_encode($array);
        
    }

    mysqli_close($connessione);



?>