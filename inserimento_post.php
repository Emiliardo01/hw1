<?php


session_start();
       
    $connessione = mysqli_connect("localhost", "root", "", "hmw1");

    $titolo = mysqli_real_escape_string($connessione,$_POST['titolo']);
    $foto = mysqli_real_escape_string($connessione,$_POST['immagine']);
    $post = mysqli_real_escape_string($connessione,$_POST['post']);
    $query1 = "SELECT id FROM Utente WHERE mail = '".$_SESSION['email']."'";
    $rrr=mysqli_query($connessione, $query1);
    while($row = mysqli_fetch_row($rrr)){

        $id = $row[0];
    }

    $query = "INSERT INTO posts(Utente,content) VALUES('$id', JSON_OBJECT('immagine','$foto','titolo','$titolo', 'post', '$post'))";
     
    if(mysqli_query($connessione,$query)){

        $result = 'true';

        echo  $result;



    }else{

        $result = 'false';

        echo  $result;


    }
    mysqli_close($connessione);

     
?>