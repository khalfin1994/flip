Тестовое задания для flip.kz

SQL-запрос:
CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       firstname VARCHAR(50) NOT NULL,
                       lastname VARCHAR(50) NOT NULL,
                       email VARCHAR(100)  NOT NULL,
                       address VARCHAR(255)
);

Не использовал UNIQUE для email т.к. в .csv файле присутствуют дубликаты

Файл users.csv должен быть в папке /storage/
