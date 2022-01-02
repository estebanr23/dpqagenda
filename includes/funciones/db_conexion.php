<?php 
    $conn = new mysqli('localhost', 'root', 'root', 'dpqagenda');

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>