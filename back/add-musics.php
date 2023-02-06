<?php
    require('conn.php');
    
    $nome = $_POST['name'];
    $artista = $_POST['artista'];
    $album = $_POST['album'];
    $genero = $_POST['genero'];
    $users_id = $_POST['USERS_ID'];
    
    $conn->query("INSERT INTO musics (NOME ,ARTISTA ,ALBUM ,GENERO, USERS_ID) 
    VALUES ('$nome','$artista', '$album', '$genero', '$users_id')");
    
    header('Access-Control-Allow-Origin: *');
    http_response_code(201);
?>