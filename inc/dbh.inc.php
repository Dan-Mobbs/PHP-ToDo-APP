<?php

// Server Variables
$dbHost = "localhost";
$dbUser = "root";
$dbPwd = "";
$dbName = "todoapp";

$conn = mysqli_connect( $dbHost, $dbUser, $dbPwd, $dbName );

if ( !$conn ) {
    die( "connection failed: " . mysqli_connect_error() );
}

