<?php

$host = 'localhost';
$username = 'africana';
$password = 'password';
$database = 'ProleanBooks';

//set DSN -- Data Source Name -- a string that has the associated
//data structure to describe a conn to our data source

$dsn = "mysql:host=$host;dbname=$database";

//create an instance of PDO
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);