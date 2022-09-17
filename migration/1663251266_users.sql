#migration 1663251266_users.sql
CREATE TABLE IF NOT EXISTS users(
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(500) NOT NULL,
    age INT(3) NOT NULL,
    updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);