<?php

session_start();

if(isset($_POST['id'])){

    $connessione = mysqli_connect("localhost", "root", "", "hmw1");

    $id = mysqli_real_escape_string($connessione, $_POST['id']);

    $query = "SELECT Username FROM Utente WHERE id= '$id'";

    $res = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));

    
while($row = mysqli_fetch_assoc($res)){

    $username = $row;

    echo json_encode($username);
}

mysqli_close($connessione);

}else{

    echo 'errore';


}





?>