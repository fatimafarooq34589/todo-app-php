<?php include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>task manager</h2>
    <form action="add.php" method="POST">
        <input type="text" name="task_name" placeholder="enter your task here" required>
        <button type="submit">add task</button>
    </form>
    <hr>

<!-- Task List -->
<table border="1">
<tr>
    <th>ID</th>
    <th>Task</th>
    <th>Status</th>
    <th>Actions</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM task");

while ($row = $result->fetch_assoc()) {
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['task_name'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
    <a class="complete" href="update.php?id=<?= $row['id'] ?>&status=completed">✔</a>
    <a class="pending" href="update.php?id=<?= $row['id'] ?>&status=pending">⏳</a>
    <a class="edit" href="update.php?id=<?= $row['id'] ?>&edit=1">✏️</a>
    <a class="delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>