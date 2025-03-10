<?php
    session_start();
    session_unset();
    session_destroy();
    $url = "index.php";
    header("Location:".$url);
?>
