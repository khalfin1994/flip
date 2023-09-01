<?php

use flip\CsvManager;

require __DIR__ . '/../src/CsvManager.php';

$host = '127.0.0.1';
$dbName = 'flip';
$username = 'root';
$password = 'Warlord@94$';

$pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

$csv = new CsvManager(__DIR__ . '/../storage/users.csv');
$csv->csvToDb($pdo);
