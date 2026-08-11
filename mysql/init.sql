-- ==========================================================
-- MySQL Database Initialization
-- MySQLデータベースの初期化
-- ==========================================================


-- Create the database if it does not exist.
-- データベースが存在しない場合に作成します。
CREATE DATABASE IF NOT EXISTS sample_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;


-- Select the database.
-- 使用するデータベースを選択します。
USE sample_db;


-- Create the users table.
-- usersテーブルを作成します。
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Insert sample data.
-- 確認用のサンプルデータを登録します。
INSERT INTO users (name, email)
VALUES
    ('Alice', 'alice@example.com'),
    ('Bob', 'bob@example.com'),
    ('Charlie', 'charlie@example.com');