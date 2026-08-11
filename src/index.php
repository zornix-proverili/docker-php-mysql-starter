<?php

// ==========================================================
// PHP + MySQL Example
// PHPからMySQLのデータを取得して表示するサンプル
// ==========================================================


// Load the database connection.
// データベース接続処理を読み込みます。
require_once __DIR__ . '/db.php';


// Get all users from the database.
// データベースからusersテーブルのデータを取得します。
$stmt = $pdo->query(
    'SELECT id, name, email, created_at FROM users ORDER BY id'
);


// Store the query results.
// SQLの実行結果を取得します。
$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Docker PHP + MySQL</title>

</head>

<body>

    <h1>Docker PHP + MySQL</h1>

    <p>
        Data retrieved from MySQL.
    </p>

    <h2>Users</h2>

    <?php if (empty($users)): ?>

    <p>No users found.</p>

    <?php else: ?>

    <table border="1">

        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($users as $user): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td>
                    <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td>
                    <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>
                </td>

                <td>
                    <?= htmlspecialchars($user['created_at'], ENT_QUOTES, 'UTF-8') ?>
                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

    <?php endif; ?>

</body>

</html>