#migration 1663251278_categories.sql
CREATE TABLE IF NOT EXISTS categories(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);