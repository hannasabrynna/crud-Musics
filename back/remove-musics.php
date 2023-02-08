<?php
    require('conn.php');
    
    $musicas = $_GET['ID'];
    
    $conn->query(" DELETE FROM musics WHERE ID = '$musicas' ");
    
    header('Access-Control-Allow-Origin: *');
    http_response_code(201);
?>