<?php

use flip\src\CsvManager;

require __DIR__ . '/../src/CsvManager.php';

$host = '127.0.0.1';
$dbName = 'flip';
$username = 'root';
$password = 'Warlord@94$';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

    $csv = new CsvManager(__DIR__ . '/../storage/users.csv');
    $csv->csvToDb($pdo);
} catch (PDOException $exception) {
    echo "Ошибка при подключении к базе данных: {$exception->getMessage()}";
    return null;
}