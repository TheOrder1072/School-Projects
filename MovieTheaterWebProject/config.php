<?php
    session_start(); 

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'movietheater');

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($link === false) {
        die("Could not connect to server. " . mysqli_connect_error());
    }   
?>