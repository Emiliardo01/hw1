<?php

session_start();

$connessione= mysqli_connect("localhost", "root", "", "hmw1");

$query = "SELECT count(id) from posts";



$query1 = "SELECT id FROM Utente WHERE mail = '".$_SESSION['email']."'";

$res1 = mysqli_query($connessione, $query1) or die("Errore: ".mysqli_error($connessione));

$row1 = mysqli_fetch_assoc($res1);

$query2 = "SELECT idpost FROM likes WHERE idutente = '".$row1['id']."'";

$res2 = mysqli_query($connessione, $query2) or die("Errore: ".mysqli_error($connessione));

if(mysqli_num_rows($res2) > 0){

    $mex = "Presente!";

   
    while($xr = mysqli_fetch_assoc($res2)){

     $z = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));
        
    $lung =  mysqli_fetch_assoc($z);

    $risultato[] = array("id" => $xr['idpost'], "messaggio" => $mex, "idpostutti" => $lung['count(id)']);



    }
    echo json_encode($risultato);

}else{

    echo "errore";


}

    mysqli_close($connessione);


?>