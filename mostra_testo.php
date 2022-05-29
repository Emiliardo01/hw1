<?php

session_start();

$connessione = mysqli_connect("localhost", "root", "", "hmw1");

$query = "SELECT * from posts";

$res = mysqli_query($connessione, $query) or die(mysqli_error($connessione));


while($row = mysqli_fetch_assoc($res)){
    $array[]= array(

    'id' => $row['Utente'],
    'idpost' => $row['id'],
    'content' => json_decode($row['content'])); 
}
echo json_encode($array);
mysqli_close($connessione);

?>