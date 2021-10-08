<?php
require 'config.php';
$serverName = $server;
$databaseName = $database;
$databaseUser = $user;
$databasePassword = $password;

try {
    $connection = new PDO('mysql:host=' . $serverName . ';dbname=' . $databaseName, $databaseUser, $databasePassword );
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connection successful";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>