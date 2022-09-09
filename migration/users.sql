CREATE TABLE IF NOT EXISTS users(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT(3) NOT NULL,
    updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, surname, email, age)
VALUES
('Olivia', 'Black', 'olivia@black.com', 24),
('Katie', 'Red', 'katie@red.com', 31),
('Brien', 'Blue', 'brien@blue.com', 42),
('Robin', 'Green', 'robin@green.com', 21),
('Nikole', 'Grey', 'nikole@grey.com', 18);
