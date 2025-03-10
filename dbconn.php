<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '12345';
    $dbname = "university";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if($conn->connect_errno ) {
        printf("Connect failed: %s<br />", $conn->connect_error);
        exit();
    }
?> 