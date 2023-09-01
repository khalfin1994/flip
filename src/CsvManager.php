<?php

declare(strict_types=1);

namespace flip;

final class CsvManager
{
    private string $csvFile;

    public function __construct($csvFilePath)
    {
        $this->csvFile = $csvFilePath;
    }

    /**
     * Create a PDO object for DB connection
     *
     * @param object $pdo A PDO object
     * @return void
     */
    public function csvToDb(object $pdo): void
    {
        if (($file = fopen($this->csvFile, 'r')) !== false) {
            $pdo->beginTransaction();

            fgetcsv($file);

            $sqlInsert = <<<SQL
        INSERT INTO users (firstname, lastname, email, address) VALUES (?, ?, ?, ?)
SQL;

            $stmt = $pdo->prepare($sqlInsert);

            while (($row = fgetcsv($file, null, ";")) !== false) {
                $stmt->execute($row);
            }

            $pdo->commit();

            fclose($file);

            echo 'Данные успешно импортированы в базу данных.';
        } else {
            echo 'Не удалось открыть файл CSV.';
        }
    }
}