<?php
    require('conn.php');
    
    $musicas_id = $_GET['id'];
    
    $conn->query("DELETE FROM musics WHERE ID = $musicas_id");
    
    header('Access-Control-Allow-Origin: *');
    http_response_code(201);
?>