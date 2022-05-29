
<?php

if(isset($_POST['nome']) && isset($_POST['cognome'])){

    $connessione = mysqli_connect("localhost", "root", "", "hmw1");

    $nome = mysqli_escape_string($connessione, $_POST['nome']);

    $cognome = mysqli_escape_string($connessione, $_POST['cognome']);

    $risultato = array();

    $query = "SELECT Nome, Cognome, mail FROM Utente WHERE nome = '".$nome."' AND cognome = '".$cognome."'";

    $res = mysqli_query($connessione, $query) or die("Errore: ".mysqli_error($connessione));

if(mysqli_num_rows($res)>0){

    while($row = mysqli_fetch_assoc($res)){

        $risultato[]= $row;

    }


}else{

    $risultato[0]= 'Nessun utente presente!';


}

    mysqli_close($connessione);

    echo json_encode($risultato);



}


?>