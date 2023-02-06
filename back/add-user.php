<?php
    require('conn.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $conn->query("INSERT INTO users (USERNAME, PASSWORD, EMAIL) VALUES ('$username', '$password', '$email')");
    
    header('Access-Control-Allow-Origin: *');
    http_response_code(201);
?>