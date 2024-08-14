<?php
    include "./database/POD-Connection.php";
    $result = $conn->prepare("SELECT * FROM users");
    $result->execute();
    $users = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Users Data</title>
</head>
<body>

    <table border="1" >
        <thead>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
                <th>phone</th>
                <th>password</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['password'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>