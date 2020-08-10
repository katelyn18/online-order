<?php
$servername = "localhost:3306";
$dbUsername = "root";
$dbPassword = "sql-password";
$dbName = "simple_eats_database";

$conn = mysqli_connect( $servername, $dbUsername, $dbPassword, $dbName );

//check connection
if( !$conn ){
    die( "ERROR: connection failed: " . mysqli_connect_error() );
}