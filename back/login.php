<?php
    require('conn.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT USERS_ID, USERNAME FROM users WHERE USERNAME = '$username' AND PASSWORD = '$password'" );
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    header('Access-Control-Allow-Origin: *');
    if (sizeof($data) == 0) {
        http_response_code(403);
        exit();
    }
    
    echo json_encode($data[0]);
?>