<?php

include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? and password=?;");
    $stmt->bind_param("ss", $_POST['email'], $_POST['password']);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows() == 1){
        header('Location: ./dashboard.php');
        exit();
    }
    else{
        echo "invalid username or password";
    }
}
$conn->close();
?>