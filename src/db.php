<?php

// ==========================================================
// MySQL Database Connection
// MySQLデータベースへの接続
// ==========================================================


// MySQL service name defined in compose.yaml.
// compose.yamlで定義したMySQLのサービス名です。
$host = 'mysql';


// Database name.
// データベース名です。
$dbname = 'sample_db';


// MySQL application user.
// MySQLのアプリケーション用ユーザーです。
$username = 'sample_user';


// MySQL application user password.
// MySQLのアプリケーション用ユーザーのパスワードです。
$password = 'sample_password';


// Character encoding.
// 使用する文字コードです。
$charset = 'utf8mb4';


// Create the PDO connection.
// PDOを使用してMySQLへ接続します。
$dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";


try {
    // Create a new PDO connection.
    // PDOによるデータベース接続を作成します。
    $pdo = new PDO($dsn, $username, $password);

    // Enable exception mode for database errors.
    // データベースエラーが発生した場合に例外を発生させます。
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // Return database results as associative arrays.
    // データベースの結果を連想配列として取得します。
    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {

    // Stop the application if the database connection fails.
    // データベースへの接続に失敗した場合は処理を停止します。
    die('Database connection failed.');
}