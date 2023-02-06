<?php
require('conn.php');

    $users_id = $_GET['USERS_ID'];

    $result = $conn->query( "SELECT * FROM musics WHERE USERS_ID = '$users_id'" );

    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    header('Access-Control-Allow-Origin: *');
    
    echo json_encode($data);
?>