<?php

$error = '';
$message = '';

$servername = 'localhost';
$databaseUser = 'root';
$databasePassword = '';
$databaseName = 'taico';

$connection = new mysqli ($servername, $databaseUser, $databasePassword, $databaseName );
if (!$connection){
    echo "Database server failed";
}



?>
